<?php

namespace App\Http\Controllers\Api\Traveler;

use App\Models\Traveler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TravelerResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller

{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $traveler = Traveler::findOrFail(auth()->guard('api_traveler')->user()->id);

        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|email|unique:travelers,email,'. $traveler->id,
            'image' => 'image|mimes:jpeg,jpg,png|max:2000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        //check image update
        if ($request->file('image')) {

            //remove old image
            Storage::disk('local')->delete('public/travelers/'.basename($traveler->image));
        
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/travelers', $image->hashName());

            //update traveler with new image
            $traveler->update([
                'image'     => $image->hashName(),
            ]);
        }

        //check password update
        if ($request->password) {

            //check password and password_confirmation
            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed',
            ]);

            if ($validator->fails()) {
                    return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->all()
                ], 400);
            }

            //update traveler with new password
            $traveler->update([
                'password'  => Hash::make($request->password),
            ]);
        }

        $traveler->update([
                'name'      => $request->name,
                'slug'      => Str::slug($request->name, '-'),
                'email'     => $request->email,
            ]);

        if($traveler) {
            //return with Api Resource
            return new TravelerResource(true, ['Update Profile Traveler Berhasil'], $traveler);
        }

        //return failed with Api Resource
        return new TravelerResource(false, ['Update Profile Traveler Gagal!'], null);
    }
}

