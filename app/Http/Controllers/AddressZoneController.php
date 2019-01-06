<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;

use ITOportunidades\AddressZone;
use Session;
use Redirect;

class AddressZoneController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresszones = AddressZone::all();

        return view('admin.address-zone.index',compact('addresszones'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.address-zone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AddressZone::create($request->all());
        Session::flash('message','Zona Creada Correctamente');
        return Redirect::to('/admin/address-zones');
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
	$addresszone = AddressZone::find($id);
        return view('admin.address-zone.edit',['addresszone'=>$addresszone]);
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
	$addresszone = AddressZone::find($id);
		
        $addresszone->fill($request->all());
        $addresszone->save();
        Session::flash('message','Zona Actualizada Correctamente');
        return Redirect::to('/admin/address-zones');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addresszone = AddressZone::find($id);
		
        $addresszone->delete();
        Session::flash('message','Zona Eliminada Correctamente');
        return Redirect::to('/admin/address-zones');        
    }
}
