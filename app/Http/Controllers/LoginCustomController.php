<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginCustomController extends Controller
{
	public function index(){
		view('auth.login');
	}
	
}
