<?php

namespace App\Http\Controllers\Api\Traveler;

use App\Models\Traveler;
use App\Models\Hartakarun;
use App\Models\TravelerRedeem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TravelerRedeemResource;

class TravelerRedeemController extends Controller
{
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hartakarun_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        $traveler_id = auth()->guard('api_traveler')->user()->id;

        $travelerRedeem = TravelerRedeem:: where('hartakarun_id', $request->hartakarun_id)->where('traveler_id', $traveler_id)->first();
       
        if($travelerRedeem){
            return response()->json([
                'success' => false,
                'message' => ['Hartakarun Sudah Diredeem']
            ], 400);
        }


        $hartakarun = Hartakarun::findOrFail($request->hartakarun_id);
        $traveler = Traveler::findOrFail($traveler_id);

        if (! $hartakarun) {
            return response()->json([
                'success' => false,
                'message' => ['Hartakarun Tidak Ditemukan']
            ], 404);
        }

        if($traveler->current_point >= $hartakarun->point){

            $traveler->update([
                'current_point' => ($traveler->current_point - $hartakarun->point)
            ]);

            TravelerRedeem::create([
                'traveler_id' => $traveler->id,
                'hartakarun_id' => $hartakarun->id,
            ]);

            $hartakarun = DB::select(
                "SELECT h.id, h.title, h.slug, h.description, h.point, 'false' as 'redeemed'
                FROM hartakaruns h Left JOIN traveler_redeems tr ON(h.id = tr.hartakarun_id)"
            );

            $redeemed_hartakarun = DB::select(
                "SELECT h.id, h.title, h.slug, h.description, h.point, 'true' as 'redeemed'
                FROM hartakaruns h Left JOIN traveler_redeems tr ON(h.id = tr.hartakarun_id)
                WHERE tr.traveler_id = $traveler_id"
            );

            foreach ($redeemed_hartakarun as $data) {
                // $hartakarun[$data->id - 1] = $data;
                unset($hartakarun[$data->id - 1]);
            }

            //return with Api Resource
            return new TravelerRedeemResource(true, ['Berhasil Redeem Hartakarun'], $hartakarun);

        }else{
            return response()->json([
                'success' => false,
                'message' => ['Poin Anda Kurang']
            ], 400);
        }
    }
}
