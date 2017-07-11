<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\ApplicationStatus;
use Session;
use Redirect;

class ApplicationStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apstatus = ApplicationStatus::all();

        return view('admin.application-status.index',compact('apstatus'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.application-status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ApplicationStatus::create($request->all());
        Session::flash('message','Estado creado correctamente');
        return Redirect::to('/admin/application-status');
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
		$apstatus = ApplicationStatus::find($id);
        return view('admin.application-status.edit',['apstatus'=>$apstatus]);
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
		$apstatus = ApplicationStatus::find($id);
		
        $apstatus->fill($request->all());
        $apstatus->save();
        Session::flash('message','Estado Actualizado Correctamente');
        return Redirect::to('/admin/application-status');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$apstatus = ApplicationStatus::find($id);
		
        $apstatus->delete();
        Session::flash('message','Estado Eliminado Correctamente');
        return Redirect::to('/admin/application-status'); 
    }
}
