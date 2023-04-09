<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatWeOffer extends Model
{
    use HasFactory;

    protected $table = 'what_we_offer';
    
    protected $fillable = ['title', 'description', 'image'];
}
