<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hartakarun extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'point',
    ];

    public function travelerRedeems(){
        return $this->hasMany(TravelerRedeem::class);
    }
}
