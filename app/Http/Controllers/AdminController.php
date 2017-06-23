<?php

namespace ITOportunidades\Http\Controllers;
use Auth;
use Redirect;

class AdminController extends Controller
{
	/**
	 * Display the admin home Page.
	 *
	 * @return \Illuminate\Http\Response
	*/
	
   public function dashboard () {
	   if (Auth::check()) {
			// The user is logged in...
			return view('admin.index');
		}
       return Redirect::to('/admin/login');
   }
}
