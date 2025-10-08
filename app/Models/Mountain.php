<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mountain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region',
        'mdpl',
        'meeting_point',
        'description'
    ];

    public function mountainImages(): HasMany
    {
        return $this->hasMany(MountainImage::class);
    }

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}