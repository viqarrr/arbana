<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutExcellence extends Model
{
    use HasFactory;

    protected $fillable = ['heading', 'paragraph', 'image'];
}
