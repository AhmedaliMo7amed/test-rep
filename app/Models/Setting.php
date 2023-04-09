<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $tables = 'settings';

    protected $fillable = [
        'website_name',
        'email',
        'mobile',
        'address',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'youtube_link',
        'map_link',
        'logo_image',
        'description',
        'keywords',
        'header_code',
        'footer_code',
        'banner_header',
        'banner_title',
        'banner_color',
        'banner_description',
        'banner_image',
    ];

    protected $guarded = [];
}
