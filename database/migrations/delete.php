<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class delete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function delete_destroy()
    {
	Auth::user()->delete();
	return Redirect::to_route('profile')
        ->with ('message', 'Profile is deleted!');

    }
