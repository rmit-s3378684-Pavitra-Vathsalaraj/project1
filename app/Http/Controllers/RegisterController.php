<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\Registered_user;
use Auth;



class RegisterController extends Controller
{
    // Function for register validation
    public function store(){
    	
    	$data=Input::except(array('_token'));

    	//var_dump($data); //Check data input

    	$rule=array(
    		'fname' =>'required',
    		'username' =>'required',
    		'password' =>'required|min:6|alpha_num',
    		'cpassword' =>'required|same:password|alpha_num',
    		'email' =>'required|email',
    		'address' =>'required',
    		'state' =>'required',
    		'country' =>'required',
    		'zip' =>'required|alpha_num',
    		'phonenum' =>'required|alpha_num'
    		);

    	$message=array(
    		'cpassword.required' => 'the confirm password is required',
    		'password.min'=> 'the confirm password must be at least 6 characters',
    		'cpassword.same' => 'the password and confirm password must be the same',
    		);

    	$validator=Validator::make($data,$rule,$message);

    	//validate register info
    	if ($validator->fails()) {
    		//if failed, return to register page with error message
    		return Redirect::to('register')->withErrors($validator);
    	} else {
    		//if passed, get all data array except _token and confirmed password
    		Registered_user::formstore(Input::except(array('_token','cpassword')));
    		//redirect to register page with success message
    		return Redirect::to('login')->with('success','Congratulations! Your account has successfully registered!');
    	}
    
    }
	
	public function destroy()
	{
	Auth::user()->delete();
	return Redirect::to_route(‘profile’)
		->with(‘message’, ‘profile was deleted!’);
	}

	
	
	
    public function postlogin(){

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
			  		
    		//var_dump($data);
    		if(Auth::attempt($userdata)){  //model name is user
    			return Redirect::to('home');
    			
    			//$email = Auth::user()->email;			/echo out Auth user info if loged in successful
    			//$password = Auth::user()->password;	/
    			//$username = Auth::user()->username;	/
				//var_dump($email,$password,$username);	/
    			//echo "yes match";
    			}else{

    			return Redirect::to('login')->with('Auth_error','something goes wrong');
    			//echo "does not match";

    			}
    		}

	}
}
