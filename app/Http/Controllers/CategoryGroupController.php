<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\CategoryGroup;
use Session;
use Redirect;
use ITOportunidades\Http\Requests;

class CategoryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catgroups = CategoryGroup::all();

        return view('admin.category-group.index',compact('catgroups'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CategoryGroup::create($request->all());
        Session::flash('message','Grupo creado correctamente');
        return Redirect::to('/admin/category-groups');
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
		$catgroup = CategoryGroup::find($id);
        return view('admin.category-group.edit',['catgroup'=>$catgroup]);
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
		$catgroup = CategoryGroup::find($id);
		
        $catgroup->fill($request->all());
        $catgroup->save();
        Session::flash('message','Grupo Actualizado Correctamente');
        return Redirect::to('/admin/category-groups'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$catgroup = CategoryGroup::find($id);
		
        $catgroup->delete();
        Session::flash('message','Grupo Eliminado Correctamente');
        return Redirect::to('/admin/category-groups'); 
    }
}
