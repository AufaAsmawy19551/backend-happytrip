<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelerRedeem extends Model
{
    use HasFactory;

    protected $fillable = [
        'traveler_id',
        'hartakarun_id',
    ];

    public function traveler(){
        return $this->belongsTo(Traveler::class);
    }

    public function hartakarun(){
        return $this->belongsTo(Hartakarun::class);
    }
}
