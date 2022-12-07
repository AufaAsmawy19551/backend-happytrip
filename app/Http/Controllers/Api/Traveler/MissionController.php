<?php

namespace App\Http\Controllers\Api\Traveler;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\MissionResource;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traveler_id = auth()->guard('api_traveler')->user()->id;

        if (request()->title) {
            $mission = DB::select(
                "SELECT wm.mission_id 'id', m.title 'title', m.point 'point', COUNT(w.id) 'wisata'
                FROM missions m LEFT JOIN wisata_missions wm ON(m.id = wm.mission_id) LEFT JOIN wisatas w ON(wm.wisata_id = w.id) 
                WHERE m.title LIKE '%" . request()->title ."%' 
                GROUP BY wm.mission_id"
            );
            $completed_mission = DB::select(
                "SELECT wm.mission_id 'id', m.title 'title', m.point 'point', COUNT(DISTINCT w.id) 'visited_wisata'
                FROM  missions m LEFT JOIN wisata_missions wm ON(m.id = wm.mission_id) LEFT JOIN wisatas w ON(wm.wisata_id = w.id) LEFT JOIN scan_points sp ON(w.id = sp.wisata_id) LEFT JOIN traveler_scans ts ON(sp.id = ts.scan_point_id)
                WHERE ts.traveler_id = $traveler_id AND m.title LIKE '%" . request()->title ."%'
                GROUP BY wm.mission_id"
            );

            for ($i = 0; $i < count($completed_mission); $i++) {
                for ($j = 0; $j < count($mission); $j++) {
                    if ($mission[$j]->id == $completed_mission[$i]->id) {
                        $mission[$j] = $completed_mission[$i];
                    }
                }
            }
        } else {
            $mission = DB::select(
                "SELECT wm.mission_id 'id', m.title 'title', m.point 'point', COUNT(w.id) 'wisata'
                FROM missions m LEFT JOIN wisata_missions wm ON(m.id = wm.mission_id) LEFT JOIN wisatas w ON(wm.wisata_id = w.id) 
                GROUP BY wm.mission_id"

            );

            $completed_mission = DB::select(
                "SELECT wm.mission_id 'id', m.title 'title', m.point 'point', COUNT(DISTINCT w.id) 'visited_wisata'
                FROM  missions m LEFT JOIN wisata_missions wm ON(m.id = wm.mission_id) LEFT JOIN wisatas w ON(wm.wisata_id = w.id) LEFT JOIN scan_points sp ON(w.id = sp.wisata_id) LEFT JOIN traveler_scans ts ON(sp.id = ts.scan_point_id)
                WHERE ts.traveler_id = $traveler_id
                GROUP BY wm.mission_id"
            );

            foreach ($completed_mission as $data) {
                $mission[$data->id - 1]->visited_wisata = $data->visited_wisata;
            }
        }

        //return with Api Resource
        return new MissionResource(true, ['List Data Mission'], $mission);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mission = Mission::whereId($id)->first();

        $traveler_id = auth()->guard('api_traveler')->user()->id;

        $wisata = DB::select(
            "SELECT w.id, w.title, w.slug, w.description, w.point, false 'is_visited' 
            FROM wisatas w LEFT JOIN scan_points sp ON(w.id = sp.wisata_id) LEFT JOIN traveler_scans ts ON(sp.id = ts.scan_point_id)
            GROUP BY w.id"
        );

        $visited_wisata= DB::select(
            "SELECT w.id, w.title, w.slug, w.description, w.point, true 'is_visited' 
            FROM wisatas w LEFT JOIN scan_points sp ON(w.id = sp.wisata_id) LEFT JOIN traveler_scans ts ON(sp.id = ts.scan_point_id)
            WHERE ts.traveler_id = $traveler_id
            GROUP BY w.id"
        );

        foreach ($visited_wisata as $data) {
            $wisata[$data->id - 1] = $data;
        }

        $mission->wisatas = $wisata;
        
        if($mission) {
            //return success with Api Resource
            return new MissionResource(true, ['Detail Data Mission!'], $mission);
        }

        //return failed with Api Resource
        return new MisionResource(false, ['Detail Data Mission Tidak Ditemukan!'], null);
    }
}
