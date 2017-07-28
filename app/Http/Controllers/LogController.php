<?php

namespace ITOportunidades\Http\Controllers;

use Auth;
use Redirect;
use Session;
use ITOportunidades\Http\Requests\LoginRequest;
use ITOportunidades\Profile;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        return view('admin.login');
    }

	public function adminLogin(LoginRequest $request)
    {
		$profile = Profile::where('code', 'ad')->first();
		$email = $request->input('email');
		$password = $request->input('password');
		
		if (Auth::attempt(['email' => $email, 'password' => $password, 'profile_id' => $profile->id])) {
			return redirect('/admin');
		} else {
			return Redirect::to('/admin/login')->withErrors("Datos incorrectos");
		}
		
    }

	public function adminLogout()
    {
        Auth::logout();
		
        return Redirect::to('/admin/login');
    }
	
	public function webLogin(LoginRequest $request)
    {
		$profile = Profile::where('code', 'ad')->first();
		$email = $request->input('email');
		$password = $request->input('password');
			
		
		if (Auth::attempt(['email' => $email, 'password' => $password]))
		{
			
			if (auth()->user()->profile_id == $profile->id){
				Auth::logout();
				return response()->json(array(	"status"=>"error", "message"=>"Datos incorrectos"));	
			}
			
			if(auth()->user()->activated == '0'){
				Auth::logout();
				return response()->json(array(	"status"=>"error",
												"message"=>"Debe activar su cuenta antes de iniciar sesión",
												"redirect"=>""));
			}
						
			return response()->json(array(	"status"=>"success", "message"=>"Bienvenido ".auth()->user()->name."!"));
		}		

		return response()->json(array(	"status"=>"error", "message"=>"Datos incorrectos"));
    }	

	public function webLogout()
    {
        Auth::logout();
		
        return Redirect::to('/');
    }
}
