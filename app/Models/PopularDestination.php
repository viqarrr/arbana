<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopularDestination extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'city',
        'region',
        'show',
        'description',
        'image',
    ];
}
