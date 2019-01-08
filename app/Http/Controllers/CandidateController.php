<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\Candidate;
use ITOportunidades\CandidateApplication;
use ITOportunidades\ApplicationStatus;
use ITOportunidades\Job;
use ITOportunidades\Factories\UserFactory;
use Auth;
use Mail;

class CandidateController extends Controller {

    protected $userFactory;

    public function __construct() {
        $this->userFactory = new UserFactory();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $candidates = Candidate::all();

        return view('admin.candidate.index', compact('candidates'));
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
        $candidate = Candidate::find($id);

        return view('admin.candidate.detail', ['candidate' => $candidate]);
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

    public function resume(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'address_zone_id' => 'required',            
            'preferred_category' => 'select_without_repeat:' . implode(',', ($request->category?: array()))
        ]);

        $candidate = $this->getCandidate($request);

        if ($candidate->save_resume($request)) {
            return response()->json(array("status" => "success",
                        "message" => trans("messages.save_success")));
        } else {
            return response()->json(array("status" => "error",
                        "message" => trans("messages.save_error")));
        }
    }

    public function jobApply(Request $request) {

        $candidate = $this->getCandidate($request);

        if (!Auth::check()) {

            $candidate->fill($request->all());

            if (!$candidate->save()) {
                return response()->json(array("status" => "error", "message" => trans("messages.save_error")));
            }
        }

        //status
        $sta = ApplicationStatus::where('code', 'new')->first();

        $cap = new CandidateApplication();

        $cap->candidate_id = $candidate->id;
        $cap->job_id = $request->job_id;
        $cap->message = $request->message;
        $cap->application_status_id = $sta->id;

        if ($cap->save()) {

            $this->sendApplyNotification($cap);

            return response()->json(array("status" => "success",
                        "message" => trans("messages.save_success")));
        } else {
            return response()->json(array("status" => "error",
                        "message" => trans("messages.save_error")));
        }
    }

    private function getCandidate(Request $request) {

        if (!Auth::check()) {

            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
            ]);

            $user = $this->userFactory->createUser($request, 'ca');
            $slug = $user->id.$user->email;
            $slug = sha1($slug);

            $candidate = new Candidate;

            $candidate->user_id = $user->id;
            $candidate->slug = $slug;
        } else {

            if (!( $candidate = Candidate::find(( currentUser()->candidate ? currentUser()->candidate->id : 0)) )) {
                return response()->json(array("status" => "error",
                            "message" => trans("messages.save_error")));
            }
        }

        return $candidate;
    }

    private function sendApplyNotification($cap) {

        $ca = Candidate::find($cap->candidate_id);
        $job = Job::find($cap->job_id);
        $co = $job->company;

        $cdata = array("name" => $co->name,
            "job" => $job->title,
            "candidate" => $ca->name,
            "notes" => $cap->message,
            "email" => $co->user->email);

        Mail::later(5, 'website.emails.application', ['cdata' => $cdata], function($msj) use ($cdata) {

            $msj->from('info@it-oportunidades.com', 'IT-Oportunidades');

            $msj->to($cdata["email"])->subject('Se ha registrado una nueva aplicación');
        });
    }

}
