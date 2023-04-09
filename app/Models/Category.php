<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_title', 'header_subtitle', 'title', 'description', 'image', 'real_title', 'banner_header',
        'banner_title',
        'banner_color',
        'banner_description',
        'banner_image', 'language_id', 'order'
    ];

    protected $appends = ['photo_path'];

    public function scopeRealTitle($query, $url)
    {
        $query->where('real_title', $url);
    }

    public function scopeLanguage($query, $lang)
    {
        $query->where('language_id', $lang);
    }

    public function scopeOrder($query)
    {
        $query->orderBy('order', 'asc');
    }

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    public function getPhotoPathAttribute()
    {
        return asset('uploads/category_images/' . $this->image);
    }
}
