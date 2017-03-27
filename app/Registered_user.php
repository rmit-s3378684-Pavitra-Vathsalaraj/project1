<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Registered_user extends Authenticatable
{
    //
	protected $table="registered_users";

    public static function formstore($data){
    	//echo "here model is";
		//
		//var_dump($data);
    	$fname=Input::get('fname');
		$username=Input::get('username');
		$password=Hash::make(Input::get('password'));
		$email=Input::get('email');
		$usertype=Input::get('usertype');
		$company=Input::get('company');
		$address=Input::get('address');
		$state=Input::get('state');
		$country=Input::get('country');
		$zip=Input::get('zip');
		$phonenum=Input::get('phonenum');
		//$remember_token=Input::get('remember_token');


		$users= new Registered_user();  //create new user model

		$users->fname=$fname;
		$users->username=$username;
		$users->password=$password;
		$users->email=$email;
		$users->usertype=$usertype;
		$users->company=$company;
		$users->address=$address;
		$users->state=$state;
		$users->country=$country;
		$users->zip=$zip;
		$users->phonenum=$phonenum;
		//$users->remember_token=$remember_token;

		  // convert data format
	
		$users->save();  //save to 'registered_users' table

    }
}
