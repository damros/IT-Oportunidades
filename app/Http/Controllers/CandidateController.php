<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\Candidate;
use ITOportunidades\CandidateApplication;
use ITOportunidades\ApplicationStatus;
use ITOportunidades\Factories\UserFactory;
use Auth;


class CandidateController extends Controller
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
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
    }
	
	public function resume(Request $request )
	{	
		
		$this->validate($request, [
			'name' => 'required|max:255'
		]);
		
		$candidate = $this->getCandidate( $request );		
		
		if ( $candidate->save_resume( $request ) ) {
			return response()->json(array(	"status"=>	"success",
											"message"=> trans("messages.save_success") ) );		
		} else {
			return response()->json(array(	"status" =>	"error",
											"message"=> trans("messages.save_error") ) );			
		}
	}
	
	public function jobApply (Request $request) {
		
		$candidate = $this->getCandidate( $request );		
		
		if ( ! Auth::check() ) {
			
			$candidate->fill($request->all());

			if ( ! $candidate->save() ) {
				return response()->json(array(	"status" =>	"error",
												"message"=> trans("messages.save_error") ) );	
			}				
		}
		
		//status
		$sta = ApplicationStatus::where('code', 'new')->first();		
		
		$cap = new CandidateApplication();
		
		$cap->candidate_id = $candidate->id;
		$cap->job_id = $request->job_id;
		$cap->message = $request->message;
		$cap->application_status_id = $sta->id;
		
		if ( $cap->save() ) {
			return response()->json(array(	"status"=>	"success",
											"message"=> trans("messages.save_success") ) );		
		} else {
			return response()->json(array(	"status" =>	"error",
											"message"=> trans("messages.save_error") ) );			
		}		
		
	}
	
	private function getCandidate ( Request $request ) {
			
		if ( ! Auth::check() ) {

			$this->validate($request, [
				'name' => 'required|max:255',
				'email' => 'required|email|unique:users',
			]);
		
			$user = $this->userFactory->createUser($request, 'ca');
			
			$candidate = new Candidate;
			
			$candidate->user_id = $user->id;
			
		} else {		
			
			if ( ! ( $candidate = Candidate::find( ( currentUser()->candidate ? currentUser()->candidate->id : 0 ) ) ) ) {
				return response()->json(array(	"status" =>	"error",
												"message"=> trans("messages.save_error") ) );			
			}
			
		}
		
		return $candidate;
	}
}
