<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\CandidateApplication;
use ITOportunidades\Http\Requests;

class CandidateApplicationController extends Controller {

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
        //
    }

    public function editApplication(Request $request) {

        $candidateApplication = CandidateApplication::where('id', $request->id)->first();

        if ($request->applicationStatus_Id != "") {
            $candidateApplication->application_status_id = $request->applicationStatus_Id;
            $candidateApplication->rating = $request->rating;

            if ($candidateApplication->update()) {
                return response()->json(array("status" => "success",
                            "message" => trans("messages.save_success"),
                            "redirect" => ""));
            } else {
                return response()->json(array("status" => "error",
                            "message" => trans("messages.save_error"),
                            "redirect" => ""));
            }
        }else{
           return response()->json(array("status" => "error",
                            "message" => "Seleccione un estado de postulación",
                            "redirect" => ""));  
        }
    }
    
     public function editNote(Request $request) {

        $candidateApplication = CandidateApplication::where('id', $request->id)->first();
        
        if ($request->notes != "") {
            $candidateApplication->notes = $request->notes;
            
            if ($candidateApplication->update()) {
                return response()->json(array("status" => "success",
                            "message" => trans("messages.save_success"),
                            "redirect" => ""));
            } else {
                return response()->json(array("status" => "error",
                            "message" => trans("messages.save_error"),
                            "redirect" => ""));
            }
        }else{
           return response()->json(array("status" => "error",
                            "message" => "Ingrese una nota para la postulación",
                            "redirect" => ""));  
        }
    }

}
