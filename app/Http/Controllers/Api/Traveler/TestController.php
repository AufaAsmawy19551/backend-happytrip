<?php

namespace App\Http\Controllers\Api\Traveler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return response()->json([
            'name' => 'budi',
            'email' => 'budi@gmail.com',
        ], 200);
    }
}
