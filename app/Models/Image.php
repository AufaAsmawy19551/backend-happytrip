<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id',
        'title',
        'slug',
        'description',
        'image',
        'isPrimary',
    ];

    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }

    /**
     * getImageAttribute
     *
     * @param  mixed $image
     * @return void
     */
    public function getImageAttribute($image)
    {
        return asset('storage/wisatas/' . $image);
    }
}
