<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region',
        'mdpl',
        'meeting_point',
        'description'
    ];

    public function destinationImages(): HasMany
    {
        return $this->hasMany(DestinationImage::class);
    }

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}
