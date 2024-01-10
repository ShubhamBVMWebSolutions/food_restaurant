<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReview;
use Symfony\Component\HttpFoundation\Session\Session;

class ReviewController extends Controller
{
    public function submit_review(Request $request){
        $user_id = session('user_id');
        $reviews = [
            'coustomer_support_rate' => $request->input('coustomer_support_rate'),
            'deliver_rate' => $request->input('deliver_rate'),
            'Quality_rate' => $request->input('Quality_rate'),
        ];

        UserReview::create([
            'user_id' => $user_id,
            'reviews' => json_encode($reviews),
            'remarks' => $request->input('compliments'),
        ]);
        return response()->json();
    }
}
