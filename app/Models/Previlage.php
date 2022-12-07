<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Previlage extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge_id',
        'title',
        'slug',
        'description',
    ];

    public function badge(){
        return $this->belongsTo(Badge::class);
    }
}
