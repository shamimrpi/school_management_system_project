<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;

class YearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::all();
        return view('years.index',compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('years.create');
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


        $year = new Year();
        $year->name = $request->name;
        $year->save();
        flash('year created successfully')->success();
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
       $year = Year::findOrFail($id);
        return view('years.edit',compact('year'));
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

        $year = Year::findOrFail($id);
        $year->name = $request->name;
        $year->save();

        flash('year updated successfully')->success();
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
        $year = Year::findOrFail($id);
         $year->delete();

         flash('year delete successfully')->error();
        return back();
    }
}
