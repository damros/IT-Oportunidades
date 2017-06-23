<?php

namespace ITOportunidades\Http\Controllers\Auth;

use ITOportunidades\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
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
	
    protected function resetPassword($user, $password){
            $user->password = $password;
            $user->save();
            Auth::login($user);
    }	

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function getRecoverWebsitePassword()
    {
        if (view()->exists('website.auth.password')) {
            return view('website.auth.password');
        }
    }
	
	public function postRecoverWebsitePassword()
    {
        return postEmail();
    }
}
