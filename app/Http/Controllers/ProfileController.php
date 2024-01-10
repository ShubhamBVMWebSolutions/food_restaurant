<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use Symfony\Component\HttpFoundation\Session\Session;

class ProfileController extends Controller
{

    public function user_profile() {
        $user_id =session('user_id');
        $profile = Profile::where('user_id',$user_id)->first();

        return view('food_home.main_content.profile',compact('profile'));
    }


    public function update_profile_picture(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user_id =$request->user_id;
        $user_profile = profile::where('user_id','=',$user_id)->first();
        if (isset($user_profile)) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('profile_images'), $imageName);
            $user_profile->profile_pic = 'profile_images/' . $imageName;
        } else{
            return redirect()->back()->with('Error, No Profile For this User Was Found');
        }
        $user_profile->save();
        return redirect()->back()->with('Success', 'Profile Pic Updated Successfully');
    }


    public function update_profile_data(Request $request) {
        $user_id =session('user_id');
        $profile = profile::updateOrCreate(
            ['user_id' => $user_id],
            [
                'last_name'   => $request->surname,
                'country_code' =>$request->selected_country_code,
                'contact_number'   => $request->contact,
                'Address_1' => $request->address_1,
                'Address_2' => $request->address_2,
                'zip_code'  => $request->postcode,
                'state'     => $request->state,
                'area'      => $request->area,
                'country'   => $request->country,
            ]
        );
        return redirect()->back();
    }
}
