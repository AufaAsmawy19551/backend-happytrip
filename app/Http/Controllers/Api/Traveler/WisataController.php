<?php

namespace App\Http\Controllers\Api\Traveler;

use App\Models\ScanPoint;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\WisataResource;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get wisata
        // $wisata = Wisata::when(request()->q, function($wisata) {
        //     $wisata = $wisata->where('title', 'like', '%'. request()->q . '%');
        // })->with('scanPoints.travelerScans', function ($wisata) {
        //     $wisata = $wisata->where('traveler_id', auth()->guard('api_traveler')->user()->id);
        // })->select([
        //     'id',
        //     'title',
        //     'slug',
        //     'location',
        //     ])->latest()->get();

        $traveler_id = auth()->guard('api_traveler')->user()->id;

        if (request()->title) {
            $wisata = DB::select(
                "SELECT w.id, w.title, w.slug, w.location, 'false' as is_visited 
                FROM wisatas w 
                WHERE w.title LIKE '%" .
                    request()->title .
                    "%'"
            );
            $visited_wisata = DB::select(
                "SELECT DISTINCT w.id, w.title, w.slug, w.location, 'true' as is_visited 
                FROM wisatas w LEFT JOIN scan_points sp ON(w.id = sp.wisata_id) LEFT JOIN traveler_scans ts ON(sp.id = ts.scan_point_id)
                WHERE ts.traveler_id = $traveler_id AND w.title LIKE '%" .
                    request()->title .
                    "%'"
            );

            for ($i = 0; $i < count($visited_wisata); $i++) {
                for ($j = 0; $j < count($wisata); $j++) {
                    if ($wisata[$j]->id == $visited_wisata[$i]->id) {
                        $wisata[$j] = $visited_wisata[$i];
                    }
                }
            }
        } else {
            $wisata = DB::select(
                "SELECT w.id, w.title, w.slug, w.location, 'false' as is_visited
                FROM wisatas w"
            );

            $visited_wisata = DB::select(
                "SELECT DISTINCT w.id, w.title, w.slug, w.location, 'true' as is_visited
                FROM wisatas w LEFT JOIN scan_points sp ON(w.id = sp.wisata_id) LEFT JOIN traveler_scans ts ON(sp.id = ts.scan_point_id)
                WHERE ts.traveler_id = " . $traveler_id
            );

            foreach ($visited_wisata as $data) {
                $wisata[$data->id - 1] = $data;
            }
        }

        //return with Api Resource
        return new WisataResource(true, ['List Data Wisata'], $wisata);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get wisata
        $wisata = Wisata::with('images')->whereId($id)->first();

        $traveler_id = auth()->guard('api_traveler')->user()->id;

        $scan_points = DB::select(
            "SELECT sp.id, sp.wisata_id, sp.title, sp.slug, sp.description, sp.point, 'true' as 'is_visited' 
            FROM scan_points sp LEFT JOIN traveler_scans ts ON(sp.id = ts.scan_point_id)
            WHERE sp.wisata_id = $id"
        );

        $visited_scan_point = DB::select(
            "SELECT sp.id, sp.wisata_id, sp.title, sp.slug, sp.description, sp.point, 'true' as 'is_visited' 
            FROM traveler_scans ts LEFT JOIN scan_points sp ON(ts.scan_point_id = sp.id)
            WHERE sp.wisata_id = $id AND (ts.traveler_id = $traveler_id OR ts.traveler_id IS NULL)"
        );

        foreach ($visited_scan_point as $data) {
            $scan_points[$data->id - 1] = $data;
        }

        $wisata->scan_points = $scan_points;
        
        if($wisata) {
            //return success with Api Resource
            return new WisataResource(true, ['Detail Data Wisata!'], $wisata);
        }

        //return failed with Api Resource
        return new WisataResource(false, ['Detail Data Wisata Tidak Ditemukan!'], null);
    }
}
