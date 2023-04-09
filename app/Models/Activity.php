<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    
    protected $fillable = ['name'];

    public function sub_activities() {
        return $this->hasMany(SubActivity::class, 'activity_id');
    }
}
