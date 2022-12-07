<?php

namespace App\Http\Controllers\Api\Traveler;

use App\Models\Traveler;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\TravelerResource;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:travelers',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        //create traveler
        $traveler = Traveler::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($traveler) {
            //return with Api Resource
            return new TravelerResource(true, ['Register Traveler Berhasil'], $traveler);
        }

        //return failed with Api Resource
        return new TravelerResource(false, ['Register Traveler Gagal!'], null);
    }
}
