<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubActivity extends Model
{
    use HasFactory;

    protected $table = 'sub_activities';
    
    protected $fillable = ['name', 'user_paid', 'price', 'activity_id'];

    public function activity() {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function profiles() {
        return $this->belongsToMany(Profile::class, 'activity_profiles', 'sub_activity_id', 'profile_id');
    }
}
