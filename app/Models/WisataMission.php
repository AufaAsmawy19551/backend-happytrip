<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id',
        'wisata_id',
    ];

    public function mission(){
        return $this->belongsTo(Mission::class);
    }

    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }

}
