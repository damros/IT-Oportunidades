<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\Http\Requests;
use ITOportunidades\JobType;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class JobTypeController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobtypes = JobType::paginate(10);

        return view('admin.job-type.index',compact('jobtypes'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JobType::create($request->all());
        Session::flash('message','Tipo Creado Correctamente');
        return Redirect::to('/admin/job-types');
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
		$jobtype = JobType::find($id);
        return view('admin.job-type.edit',['jobtype'=>$jobtype]);
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
		$jobtype = JobType::find($id);
		
        $jobtype->fill($request->all());
        $jobtype->save();
        Session::flash('message','Tipo Actualizado Correctamente');
        return Redirect::to('/admin/job-types');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$jobtype = JobType::find($id);
		
        $jobtype->delete();
        Session::flash('message','Tipo Eliminado Correctamente');
        return Redirect::to('/admin/job-types');        
    }
			
}
