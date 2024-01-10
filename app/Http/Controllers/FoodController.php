<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReview;
use App\Models\Food;
use Illuminate\Support\Facades\Crypt;
use App\Models\Coupon;
use App\Models\Cart;
use Symfony\Component\HttpFoundation\Session\Session;

class FoodController extends Controller
{
    public function food_home()
    {
        return view('food_home.main_content.content');
    }

    public function testimonials()
    {
        $user_review = new UserReview;
        $reviews = $user_review->getUserReviewsWithUserData();
        return view('food_home.main_content.testimonials', compact('reviews'));
    }

    public function checkout(Request $request)
    {
        if (Session('user_id')) {
            $user_id = Session('user_id');
            $food_item = Cart::join('food', 'carts.food__id', '=', 'food.id')->where('carts.user_id', $user_id)->get();
            $coupons = Coupon::all();
            foreach ($food_item as $item) {
                $category = $item->category;
            }
            $similar_products = Food::where('category', $category)->get();
            return view('food_home.main_content.checkout', compact('food_item', 'coupons', 'similar_products'));
        } else {
            return redirect()->route('login');
        }
    }

    public function add_to_cart(Request $request)
    {
        $food_id = $request->id;
        $user_id = Session('user_id');
        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->food__id = $food_id;
        $cart->save();
        $food_item = Food::where('id', '=', $food_id)->first();
        return response()->json(['success' => true, 'product' => $food_item]);
    }

    public function get_Coupons(Request $request)
    {
        $id = $request->id;
        $coupons = Coupon::where('id', $id)->first();
        return response()->json($coupons);
    }

    public function test()
    {
        return view('test');
    }
}
