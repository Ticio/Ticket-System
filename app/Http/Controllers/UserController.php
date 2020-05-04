<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

class UserController extends Controller
{
	public function profile(){
		return view("profile");
	}

	public function password(Request $request){
		$save = false;

		if (!empty($request->input("password"))) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8|confirmed'
            ]);

            if ($validator->fails()) {
	            $save = false;
	        } else {
	            Auth::user()->password = \Hash::make($request->input("password"));
	            $save = Auth::user()->save();
	        }
        }

		if ($save){
            $notification = array(
                'message'    => 'User details updated successfully', 
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message'    => 'Problem in the desired operation. Try again!!!', 
                'alert-type' => 'error'
            );
        }

        if ($save){
            return back()->with($notification);
        }else{
            return redirect()->back()->withErrors($validator);
        }
	}
	
	public function user_details(Request $request){
		if(!empty(Auth::user()->name)){
	    	Auth::user()->name = $request->input("name");
	    }

	    if(Auth::user()->email != $request->input("email") && !empty($request->input("email"))){
	    	Auth::user()->email = $request->input("email");
	    }

	    $saved = Auth::user()->save();

		if ($saved){
            $notification = array(
                'message'    => 'User details updated successfully', 
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message'    => 'Problem in the desired operation. Try again!!!', 
                'alert-type' => 'error'
            );
        }

        if ($saved){
            return back()->with($notification);
        }else{
            return redirect()->back()->withErrors($validator);
        }
	}
}
