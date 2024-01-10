<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','reviews','remarks'];

    public function getUserReviewsWithUserData() {
        $reviews = UserReview::join('users','user_reviews.user_id','=','users.id')
        ->get();
        return $reviews;
    }
}
