<?php

namespace ITOportunidades\Http\Controllers\Auth;

use Illuminate\Http\Request;
use ITOportunidades\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;


class WebsitePasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;	
	
	protected $linkRequestView = "website.auth.password";
	protected $resetView = "website.auth.reset";
	protected $subject = "IT-Oportunidades - Cambio de contraseña";
	protected $redirectPath = "/";
	

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

}
