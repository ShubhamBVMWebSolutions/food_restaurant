<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\UserReview;
use App\Models\profile;

class LoginController extends Controller
{
    public function login_page()  {
        return view('food_home.login.login');
    }

    public function user_registration(Request $request){
        $user = new User;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= $request->password;
        $saved_user =$user->save();
        if($saved_user){
            $my_user = User::where('email', $user->email)->first();
            $user_id=$my_user->id;
            $username = $my_user->name;
            $email = $my_user->email;
            $profile = new profile;
            $profile->user_id =$user_id;
            $profile->save();
            session()->put(['user_id'=>$user_id,'username' =>$username, 'email' => $email]);
            return redirect()->route('home');
        }
    }

    public function user_login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password'=>'required',
        ]);
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        $user_review = UserReview::where('user_id','=',$user->id)->first('id');

        if($user == null){
          return redirect()->back()->with('error', 'please check the email.');
        }else{
            $hashed_pass = $user->password;
            $user_id=$user->id;
            $username = $user->name;
            $email = $user->email;
            $role_id= $user->role_id;
            if (Hash::check($password, $hashed_pass)) {
                session()->put(['user_id'=>$user_id,'username' =>$username, 'email' => $email,'role_id'=>$role_id ,'review_id'=>$user_review]);
                if ($role_id != 2) {
                    return redirect()->route('adminDashboard');
                } else {
                    return redirect()->route('home');
                }
          } else{
              return redirect()->back()->with('error','Password Or Email-Address is not correct.');
            }
        }
    }


    public function logout()  {
        session()->flush();
        return redirect()->route('home');
    }
}
