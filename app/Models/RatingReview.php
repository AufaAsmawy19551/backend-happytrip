<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'traveler_id',
        'wisata_id',
        'slug',
        'description',
        'image',
        'isPrimary',
    ];

    public function traveler(){
        return $this->belongsTo(Traveler::class);
    }

    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }
}
