<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\Job;
use ITOportunidades\Company;
use ITOportunidades\Factories\UserFactory;
use Auth;

class CompanyController extends Controller
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
          $companies = Company::all();

        return view('admin.company.index',compact('companies'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.company.detail',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		$id = $request->id;
		
		if ( ! ( $company = Company::find( $id ) ) ) {
			return response()->json(array(	"status" =>	"error",
											"message"=> trans("messages.save_error") ) );			
		}
		
		$company->fill($request->all());
		
		$company->save();
		
		return response()->json(array(	"status"=>	"success",
										"message"=> trans("messages.save_success") ) );			
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function addJob( Request $request ) {
		
		$this->validate($request, [
			'title' => 'required|max:255'
		]);
		
		if ( ! Auth::check() ) {
			
			$this->validate($request, [
				'name' => 'required|max:255',
				'email' => 'required|email|unique:users'
			]);
			
			$user = $this->userFactory->createUser($request, 'co');	
			
			$company = new Company;						
			$company->fill($request->all());
			$company->user_id = $user->id;
			$company->save();
	
			
		} else {
					
			if ( ! ( $company = Company::find( ( currentUser()->company ? currentUser()->company->id : 0 ) ) ) ) {
				return response()->json(array(	"status" =>	"error",
												"message"=> trans("messages.save_error") ) );			
			}
			
		}		
		
		$job = New Job;
		
		$job->company_id = $company->id;
		$job->fill($request->all());
		$job->save();
		
		$job->save_categories( $request );
		$job->save_principal_category( $request );
		
		return response()->json(array(	"status"=>	"success",
										"message"=> trans("messages.save_success") ) );
		
	}
	
	public function editJob( Request $request ) {
		
		$this->validate($request, [
			'title' => 'required|max:255'
		]);		
		
		$job = Job::find($request->id);
		
		$job->fill($request->all());
		$job->save();
		
		$job->save_categories( $request );
		$job->save_principal_category( $request );		
		
		return response()->json(array(	"status"=>	"success",
										"message"=> trans("messages.save_success") ) );		
	}
}
