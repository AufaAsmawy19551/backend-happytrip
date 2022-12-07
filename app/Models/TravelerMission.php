<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelerMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'traveler_id',
        'mission_id',
    ];

    public function traveler(){
        return $this->belongsTo(Traveler::class);
    }

    public function mission(){
        return $this->belongsTo(Mission::class);
    }

}
