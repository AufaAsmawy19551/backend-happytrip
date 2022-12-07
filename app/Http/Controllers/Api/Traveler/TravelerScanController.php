<?php

namespace App\Http\Controllers\Api\Traveler;

use App\Models\Traveler;
use App\Models\ScanPoint;
use App\Models\TravelerScan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TravelerScanResource;

class TravelerScanController extends Controller
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
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        $traveler_id = auth()->guard('api_traveler')->user()->id;

        $scanPoint = ScanPoint::where('code', $request->code)->first();

        if(! $scanPoint){
            return response()->json([
                'success' => false,
                'message' => ['Scan Point Tidak Ditemukan']
            ], 400);
        }

        $travelerScan = TravelerScan::where('traveler_id', $traveler_id)->where('scan_point_id', $scanPoint->id)->first();
       
        if($travelerScan){
            return response()->json([
                'success' => false,
                'message' => ['Anda Sudah Melakukan Scan']
            ], 400);
        }

        $traveler = Traveler::findOrFail($traveler_id);


        TravelerScan::create([
            "traveler_id" => $traveler_id,
            "scan_point_id" => $scanPoint->id,
        ]);

        $traveler->update([
            "current_point" => ($traveler->current_point + $scanPoint->point),
            "collected_point" => ($traveler->collected_point + $scanPoint->point),
        ]);

        //return with Api Resource
        return new TravelerScanResource(true, ['Scan Point Berhasil Discan'], null);
    }
}
