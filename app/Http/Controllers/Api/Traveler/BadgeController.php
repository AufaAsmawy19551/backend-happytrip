<?php

namespace App\Http\Controllers\Api\Traveler;

use App\Models\Badge;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BadgeResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get badge
        $badge = Badge::when(request()->title, function($badge) {
            $badge = $badge->where('title', 'like', '%'. request()->title . '%');
        })->latest()->get();
        
        //return with Api Resource
        return new BadgeResource(true, ['List Data Badge'], $badge);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $badge = Badge::with('previlages')->whereId($id)->first();
        
        if($badge) {
            //return success with Api Resource
            return new BadgeResource(true, ['Detail Data Badge!'], $badge);
        }

        //return failed with Api Resource
        return new BadgeResource(false, ['Detail Data Badge Tidak DItemukan!'], null);
    }
}
