<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsDetail extends Model
{
    use HasFactory;

    protected $table = 'about_us_details';
    
    protected $fillable = ['title', 'description', 'button', 'button_link', 'image'];
}
