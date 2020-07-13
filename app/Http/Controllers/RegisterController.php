<?php

namespace NimrPublication\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use DB;
class RegisterController extends Controller
{
    function userRegistration(Request $request){
    	$data = Input::except(array('_token'));
    	$rule = array(
    		'sname'=>'required',
    		'fname'=>'required',
    		'email'=>'required|email|regex:/^\w+([\.-]?\w+)*@nimr.or.tz+$/',
    		'password'=>'required|min:4',
    		'cpassword'=>'required|same:password'
    		);
    	$message = array(
    		'cpassword.required'=>'the confirm password is required',
    		'cpassword.same'=>'provided passwords does not match',
    		'fname.required'=>'first name field is required',
    		'sname.required'=>'surname is required'
    		);
    	$validator = Validator::make($data,$rule,$message);
    	if ($validator->fails()) {
    		return Redirect::to('register')->withErrors($validator)->withInput();
    	}else{
    		$surname = $request->sname;
    		$middlename = $request->mname;
    		$firstname = $request->fname;  
    		$email = $request->email;
    		$password = bcrypt($request->password);
    		$mob = $request->mobile;
            $email2 = $request->email2;
    		DB::table('users')->insert(
    			['fname'=>$firstname,'mname'=>$middlename,"sname"=>$surname,
    			'email'=>$email,'mobile'=>$mob,'email2'=>$email2,'password'=>$password]
    			);  

             return back()->with('success', 'Registered Successfully.');
    		    	}
    }
    function login(Request $request){
    	$data = Input::except(array('_token','submit'));
    	$rule = array(
    		'email'=>'required|email',
    		'password'=>'required',
    		);
    	$validator = Validator::make($data,$rule);
    	if ($validator->fails()) {
    		return Redirect::to('login')->withErrors($validator)->withInput();
    	}else{ 
    		$username = $request->email;
    		$password = $request->password; 
			if (Auth::attempt($data)) {
            // Authentication passed...
            return redirect()->intended('');
        	}
        	else{
        	return redirect()->back()->with('error','wrong username and password commbination.');
        	}
    	}
    }
    function logout(){
    	Auth::logout();
        return Redirect::to('');    
    	    }
}
