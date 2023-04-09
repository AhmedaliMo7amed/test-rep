<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    
    protected $fillable = ['name', 'age', 'type'];

    public function sub_activities() {
        return $this->belongsToMany(SubActivity::class, 'activity_profiles', 'profile_id', 'sub_activity_id');
    }
}
