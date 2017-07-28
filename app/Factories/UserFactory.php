<?php
/**
 * Description of UserFactory
 *
 * @author Damian
 */

namespace ITOportunidades\Factories;

use Mail;
use ITOportunidades\Profile;
use ITOportunidades\User;
use Illuminate\Http\Request;
use ITOportunidades\UserActivation;

class UserFactory {

	public function createUser ( Request $request, $profileCode ) {

		//perfil
		$profile = Profile::where('code', $profileCode)->first();

		// crear el usuario
		$cdata = array( "name" => $request->name,
						"email" => $request->email,
						"profile_id" => ( $profile ? $profile->id : "null" ),
						"password" => bcrypt( $request->password ?: str_random(10) ) );

		$user = User::create($cdata);
		
		$this->sendActivationMail($user, $cdata);	
		
		return $user;
		
	}

	public function sendActivationMail( $user, $cdata )
    {	
		
		$cdata['link'] = str_random(30);
		$ua = new UserActivation();		

		$ua->user_id = $user->id;
		$ua->token = $cdata['link'];

		$ua->save();

		Mail::later(5,'website.emails.activation', ['cdata'=>$cdata], function($message) use ($cdata) {
			$message->to($cdata['email']);
			$message->subject(trans('auth.Account_Activation_Email_Subject'));
		});
    }		
}
