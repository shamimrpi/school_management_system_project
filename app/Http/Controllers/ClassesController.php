<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_class;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $classes = Student_class::all();
        return view('classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
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
            'name' => 'required|max:40|min:2|unique:student_classes'
        ]);


        $s_class = new Student_class();
        $s_class->name = $request->name;
        $s_class->save();
        flash('Class created successfully')->success();
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
        $s_class = Student_class::findOrFail($id);
        return view('classes.edit',compact('s_class'));
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

        $s_class = Student_class::findOrFail($id);
        $s_class->name = $request->name;
        $s_class->save();

        flash('Class updated successfully')->success();
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
        $s_class = Student_class::findOrFail($id);
         $s_class->delete();

         flash('Class delete successfully')->error();
        return back();
    }
}
