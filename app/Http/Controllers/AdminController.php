<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodCategory;
use App\Models\Food;
use App\Models\ingredient;
use App\Models\Coupon;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{
    public function adminDashboard() {
        if (Session('user_id')) {
            if (Session('role_id','=','1')) {
                return view('Admin.AdminDashboard');
            } else {
                return redirect()->back()->with('message => Logged In Successfully');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function menu_listing()  {
        if (Session('user_id')) {
            if (Session('role_id','=','1')) {
                $categories = FoodCategory::all();
                $ingredient= ingredient::all();
                return view('Admin.menu_listing' ,compact('categories','ingredient'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function add_food(Request $request) {
        if (Session('user_id')) {
            if (Session('role_id','=','1')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('food_images'), $imageName);
                $food = new food;
                $food->image = 'food_images/' . $imageName;
                $food->name = $request->name;
                $food->category = $request->category;
                $food->price = $request->price;
                $food->ingrediants = json_encode($request->ingrediants);
                $food->save();
                return redirect()->back()->with('Food Added Successfully');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function add_chief()  {
        if (Session('user_id')) {
            if (Session('role_id','=','1')) {
                return view('Admin.add_chief');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function add_new_chief(Request $request)  {
        if (Session('user_id')) {
            if (Session('role_id','=','1')) {
                dd($request->all());
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function coupons()
    {
        if (Session('user_id')) {
            if (Session('role_id','=','1')) {
                return view('Admin.add_coupons');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function add_new_coupon(Request $request)
    {
        if (Session('user_id')) {
            if (Session('role_id','=','1')) {
                $request->validate([
                    'name' => 'required|string',
                    'coupon_type' => 'required|string',
                    'coupon_value' => 'required|numeric',
                    'coupon_discription'=>'required',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date',
                    'cart_amount' => 'required|numeric',
                ]);
                $coupon=new coupon;
                $coupon->name = $request->name;
                $coupon->coupon_type= $request->coupon_type;
                $coupon->coupon_value= $request->coupon_value;
                $coupon->coupon_discription= $request->coupon_discription;
                $coupon->coupon_valid_from= $request->start_date;
                $coupon->coupon_valid_till= $request->end_date;
                $coupon->cart_value= $request->cart_amount;
                $coupon->coupon_code= $request->coupon_code;
                $coupon->save();
                return response()->json(['success' => true, 'message' => 'Coupon added successfully']);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function getCouponsData()
    {
        $coupons = Coupon::all();
        return response()->json($coupons);
    }

    public function delete_coupon($id) {
       $coupon = Coupon::find($id);
      if (!$coupon) {
        return response()->json(['error' => 'Coupon not found'], 404);
      }
      $coupon->delete();
      return response()->json(['message' => 'Coupon is being deleted successfully']);
    }

    public function getcoupondata($id)
    {
       $coupon_data = Coupon::where('id','=',$id)->first();
       if (!$coupon_data) {
        return response()->json(['error' => 'Coupon not found'], 404);
      }
        return response()->json($coupon_data);

    }

    public function update_coupon(Request $request)
    {
        $id = $request->id;
        $coupon_data = Coupon::where('id','=',$id)->first();
        if (!$coupon_data) {
            return response()->json(['error' => 'Coupon not found'], 404);
        }
        $coupon_data->name = $request->name;
        $coupon_data->coupon_type= $request->coupon_type;
        $coupon_data->coupon_value= $request->coupon_value;
        $coupon_data->coupon_discription= $request->coupon_discription;
        $coupon_data->coupon_valid_from= $request->start_date;
        $coupon_data->coupon_valid_till= $request->end_date;
        $coupon_data->cart_value= $request->cart_amount;
        $coupon_data->save();
        return response()->json(['success' => true, 'message' => 'Coupon updated successfully']);

    }
}
