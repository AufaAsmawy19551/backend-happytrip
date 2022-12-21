<?php

namespace App\Http\Controllers\Api\Traveler;

use App\Models\Hartakarun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\WisataResource;

class HartakarunController extends Controller
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
            $hartakarun = DB::select(
                "SELECT h.id, h.title, h.slug, h.description, h.point, 'false' AS 'redeemed'
                FROM hartakaruns h Left JOIN traveler_redeems tr ON(h.id = tr.hartakarun_id)
                WHERE h.title LIKE '%" . request()->title . "%'"
            );

            $redeemed_hartakarun = DB::select(
                "SELECT h.id, h.title, h.slug, h.description, h.point, 'true' AS 'redeemed'
                FROM hartakaruns h Left JOIN traveler_redeems tr ON(h.id = tr.hartakarun_id)
                WHERE tr.traveler_id = $traveler_id AND h.title LIKE '%" . request()->title . "%'"
            );

            for ($i = 0; $i < count($redeemed_hartakarun); $i++) {
                for ($j = 0; $j < count($hartakarun); $j++) {
                    if ($hartakarun[$j]->id == $redeemed_hartakarun[$i]->id) {
                        // $hartakarun[$j] = $redeemed_hartakarun[$i];
                        unset($hartakarun[$j]);
                    }
                }
            }
        } else {
            $hartakarun = DB::select(
                "SELECT h.id, h.title, h.slug, h.description, h.point, 'false' AS 'redeemed'
                FROM hartakaruns h Left JOIN traveler_redeems tr ON(h.id = tr.hartakarun_id)"
            );

            $redeemed_hartakarun = DB::select(
                "SELECT h.id, h.title, h.slug, h.description, h.point, 'true' AS 'redeemed'
                FROM hartakaruns h Left JOIN traveler_redeems tr ON(h.id = tr.hartakarun_id)
                WHERE tr.traveler_id = $traveler_id"
            );

            foreach ($redeemed_hartakarun as $data) {
                // $hartakarun[$data->id - 1] = $data;
                unset($hartakarun[$data->id - 1]);
            }
        }

        //return with Api Resource
        return new WisataResource(true, ['List Data Hartakarun'], $hartakarun);
    }
}
