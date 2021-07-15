<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee_category;

class FeeCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $f_cats = Fee_category::all();
        return view('fee_categories.index',compact('f_cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create_data = 'create_data';
        return view('fee_categories.edit_create',compact('create_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validation
        $this->validate($request,[
            'name' => 'required|max:40|min:2|unique:shifts'
        ]);


        $f_cat = new Fee_category();
        $f_cat->name = $request->name;
        $f_cat->save();
        flash('fee-category created successfully')->success();
        return back();
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
         $edit_data = 'edit_data';
         $f_cat = Fee_category::findOrFail($id);
        return view('fee_categories.edit_create',compact(['f_cat','edit_data']));
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
         //validation
        $this->validate($request,[
            'name' => 'required|max:40|min:2|unique:student_classes,name,'.$id
        ]);

        $f_cat = Fee_category::findOrFail($id);
        $f_cat->name = $request->name;
        $f_cat->save();

        flash('Fee Category update successfully')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $f_cat = Fee_category::findOrFail($id);
         $f_cat->delete();

         flash('fee Category delete successfully')->error();
        return back();
    }
}
