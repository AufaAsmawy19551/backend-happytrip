<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'image', 
        'point',
    ];

    public function previlages(){
        return $this->hasMany(Previlage::class);
    }

    public function travelers(){
        return $this->hasMany(Traveler::class);
    }

    /**
     * getImageAttribute
     *
     * @param  mixed $image
     * @return void
     */
    public function getImageAttribute($image)
    {
        return asset('storage/badges/' . $image);
    }

}
