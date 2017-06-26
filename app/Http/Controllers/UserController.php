<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\Http\Requests\UserCreateRequest;
use ITOportunidades\User;
use ITOportunidades\Candidate;
use ITOportunidades\Company;
use ITOportunidades\Profile;
use ITOportunidades\UserActivation;
use ITOportunidades\Factories\UserFactory;
use Session;
use Redirect;

class UserController extends Controller
{	
    protected $userFactory;

    public function __construct()
    {
        $this->userFactory = new UserFactory();
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.user.index',compact('users'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$profiles = Profile::lists('name','id');
				
        return view('admin.user.create',compact('profiles'));
    }
	
	 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
	{
        User::create($request->all());
        Session::flash('message','Usuario Creado Correctamente');
        return Redirect::to('/admin/users'); 		
	}

	public function candidateRegister(UserCreateRequest $request)
    {
	
		try {
			
			if ( ( $user = $this->userFactory->createUser($request, 'ca') ) ) {

				$cdata = array(	"user_id" => $user->id,
								"name" => $user->name );

				Candidate::create($cdata);
								

				return response()->json(array(	"status"=>"success",
												"message"=>"Registro realizado con éxito. Revise su correo electrónico para activar la cuenta",
												"redirect"=>"" ));

			} else {

				return response()->json(array(	"status"=>"error",
												"message"=>"Ha ocurrido un error inesperado, por favor vuelva a intentarlo",
												"redirect"=>"" ));
			}
			
		} catch (Exception $ex) {
			
			return response()->json(array(	"status"=>"error",
											"message"=>"Ha ocurrido un error inesperado, por favor vuelva a intentarlo",
											"redirect"=>"" ));
			
		}
		
    }
	
	public function companyRegister(UserCreateRequest $request)
    {
		if ( ( $user = $this->userFactory->createUser($request, 'co') ) ) {		
		
			$cdata = array(	"user_id" => $user->id,
							"name" => $user->name,
							"email" => $user->email,
							"identification" => $request->identification );
		
			Company::create($cdata);
			
			return response()->json(array(	"status"=>"success",
											"message"=>"Registro realizado con éxito. Revise su correo electrónico para activar la cuenta",
											"redirect"=>"" ));			
			
		} else {
			return response()->json(array(	"status"=>"error",
											"message"=>"Ha ocurrido un error inesperado, por favor vuelva a intentarlo",
											"redirect"=>"" ));
		}        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user = User::find($id);
		$profiles = Profile::lists('name','id');
        return view('admin.user.edit',['user'=>$user,'profiles'=>$profiles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$user = User::find($id);
		
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/admin/users'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
		$user->delete();
		Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/admin/users');
    }
	
    /**
     * Check for user Activation Code
     *
     * @param  array  $token
     * @return User
     */	
    public function userActivation($token)
    {
        $check = UserActivation::where('token',$token)->first();

        if( ! is_null($check) ) {
			
            $user = User::find($check->user_id);

            if($user->activated == 1){
                return redirect()->to('my-account')
                    ->with('success',trans('messages.User_Already_Activated'));                
            }

            $user->update(['activated' => 1]);
			
            UserActivation::where('token',$token)->delete();

            return redirect()->to('my-account')
                ->with('success',trans('messages.User_Activated_Successfully'));
        }

        return redirect()->to('my-account')
                ->with('warning',trans('messages.Token_Invalid'));
    }	
}
