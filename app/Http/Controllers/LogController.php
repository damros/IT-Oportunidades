<?php

namespace ITOportunidades\Http\Controllers;

use Auth;
use Redirect;
use ITOportunidades\Http\Requests\LoginRequest;

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
		$field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$request->merge([$field => $request->input('login')]);
		
		if (Auth::attempt($request->only($field, 'password')))
		{
			return redirect('/admin');
		}		

        return Redirect::to('/admin/login');
    }

	public function adminLogout()
    {
        Auth::logout();
		
        return Redirect::to('/admin/login');
    }
	
	public function webLogin(LoginRequest $request)
    {
		$field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$request->merge([$field => $request->input('login')]);
		
		if (Auth::attempt($request->only($field, 'password')))
		{
			
			if(auth()->user()->activated == '0'){
				Auth::logout();
				return response()->json(array(	"status"=>"error",
												"message"=>"Debe activar su cuenta antes de iniciar sesión",
												"redirect"=>""));
			}
						
			return response()->json(array(	"status"=>"success",
											"message"=>"Bienvenido ".auth()->user()->name."!"));
		}		

		return response()->json(array(	"status"=>"error",
										"message"=>"Datos incorrectos"));
    }	

	public function webLogout()
    {
        Auth::logout();
		
        return Redirect::to('/');
    }
}
