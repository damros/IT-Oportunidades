<?php

namespace ITOportunidades\Http\Controllers;

use Auth;
use Redirect;
use ITOportunidades\Candidate;
use ITOportunidades\User;

class AdminController extends Controller {

    /**
     * Display the admin home Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard() {
        if (Auth::check()) {
            // The user is logged in...
            return view('admin.index');
        }
        return Redirect::to('/admin/login');
    }
    
    public function update() {
        
        $candidates = Candidate::all();
        
        foreach ($candidates as $c) {
            $user = User::find($c->user_id);
            
            $slug = $user->id.$user->email;
            $slug = sha1($slug);
            
            $c->slug = $slug;
            $c->save();
            
        }
        
        return "Finalizado";
            
    }

}
