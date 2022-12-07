<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelerScan extends Model
{
    use HasFactory;

    protected $fillable = [
        'traveler_id',
        'scan_point_id',
    ];

    public function traveler(){
        return $this->belongsTo(Traveler::class);
    }

    public function scanPoint(){
        return $this->belongsTo(ScanPoint::class);
    }
}
