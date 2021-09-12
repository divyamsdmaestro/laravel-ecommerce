<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class UserController extends Controller
{
    //
    public function User()
    {
        return view('frontend.index');
    }

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        return view('frontend.profile_view',compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        // echo '<pre>';
        // print_r($request);
        // exit;
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email= $request->email;
        $data->phone= $request->phone;

        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            $uni_name = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_profile'),$uni_name);
            $data['profile_photo_path'] = $uni_name;
        }
        $data->save();
        $notification = array(
          'message' =>'Profile Updated Successfully',
          'alert-type' =>'success'
        );
        return redirect()->route('frontend.profile_view')->with($notification);
   
    }


    public function UserChangePassword()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        return view('frontend.change_password_form',compact('user'));
    }

    public function UserChangePasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required',
        ]);
        $hasdedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hasdedPassword))
        {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }
        else
        {
            return redirect()->back();
        }
    }
}
