<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'point',
    ];

    public function travelerMissions(){
        return $this->hasMany(TravelerMission::class);
    }
    
    public function wisataMissions(){
        return $this->hasMany(WisataMission::class);
    }
}
