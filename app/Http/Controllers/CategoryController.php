<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\Category;
use ITOportunidades\CategoryGroup;
use Session;
use Redirect;
use ITOportunidades\Http\Requests\CategoryCreateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
		
        return view('admin.category.index',compact('categorys')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$catgroups = CategoryGroup::lists('name','id');
		
        return view('admin.category.create',compact('catgroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        Category::create($request->all());
        Session::flash('message','Categoría creada correctamente');
        return Redirect::to('/admin/categorys');
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
		
		$category = Category::find($id);
		$catgroups = CategoryGroup::lists('name','id');
        return view('admin.category.edit',['category'=>$category,'catgroups'=>$catgroups]);
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
		$category = Category::find($id);
		
        $category->fill($request->all());
        $category->save();
        Session::flash('message','Estado Actualizado Correctamente');
        return Redirect::to('/admin/categorys'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$category = Category::find($id);
		
        $category->delete();
        Session::flash('message','Categoria Eliminada Correctamente');
        return Redirect::to('/admin/categorys');
    }
}
