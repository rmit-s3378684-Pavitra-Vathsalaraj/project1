<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Auth;

class LoginController extends Controller
{

	public function login(){

		//echo "login function";
		$data=input::except(array('_token'));

    	//var_dump($data) //Check data input

    	$rule=array(
    		'email' =>'required|email',
    		'password' =>'required|min:6|alpha_num',
    		);
	
		$validator=Validator::make($data,$rule);

    	//validate register info
    	if ($validator->fails()) {
    		//if failed, return to login page with error message
    		return Redirect::to('login')->withErrors($validator);
    	} else {

			$userdata=array(
				'email'=>Input::get('email'),
				'password'=>Input::get('password')
				);
			}    		
    		//var_dump($data);
    		if(User::Auth::attempt($userdata){  //model name is user
    			//return Redirect::to('login')->with('login_success','you have successfully log in!');//
				echo "$userdata";    			
    			}else{

    				return Redirect::to('login')->with('Auth_error','something goes wrong');

    			}
    		}

	}
    //
}
