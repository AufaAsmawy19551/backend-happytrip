<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScanPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id',
        'title',
        'slug',
        'description',
        'code',
        'point',
    ];

    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }

    public function travelerScans(){
        return $this->hasMany(TravelerScan::class);
    }
}
