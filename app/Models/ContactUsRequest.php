<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsRequest extends Model
{
    use HasFactory;

    protected $tables = 'contact_us_requests';

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'message'];
}
