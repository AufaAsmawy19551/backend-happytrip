<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'harga_tiket',
        'point',
        'denah',
        'video',
        'visit',
        'rating',
    ];

    public function scanPoints(){
        return $this->hasMany(ScanPoint::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function ratingReviews(){
        return $this->hasMany(RatingReview::class);
    }

    public function wisataMissions(){
        return $this->hasMany(WisataMission::class);
    }

    /**
     * getImageAttribute
     *
     * @param  mixed $image
     * @return void
     */
    public function getVideoAttribute($video)
    {
        return asset('url' . $video);
    }
}
