<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TripPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'name',
        'price',
        'includes',
        'excludes',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
