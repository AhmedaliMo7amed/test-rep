<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'long_desc',
        'image',
        'btn_visibility',
        'btn_text',
        'category_id',
        'at_a_glance',
        'amenities',
        'language_id',
        'popup_content',
        'has_carousel',
        'carousel_img_1',
        'carousel_img_2',
        'carousel_img_3',
        'carousel_img_4',
        'carousel_img_5',
    ];

    protected $appends = ['photo_path'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getPhotoPathAttribute()
    {
        return asset('uploads/sub_category_images/' . $this->image);
    }

    public function getCarouselPathAttribute()
    {
        return 'uploads/carousel/';
    }


}
