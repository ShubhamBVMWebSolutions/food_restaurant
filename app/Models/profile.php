<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = ['user_id','profile_pic','last_name','country_code','contact_number','Address_1','Address_2','zip_code','state','area','country'];
    use HasFactory;
}
