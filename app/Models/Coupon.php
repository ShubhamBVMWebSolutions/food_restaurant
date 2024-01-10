<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'coupon_type',
    'coupon_discription',
    'coupon_value',
    'coupon_valid_from',
    'coupon_valid_till',
    'cart_value',
    'coupon_code',
    ];
}
