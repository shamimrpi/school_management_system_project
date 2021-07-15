<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = ExamType::all();
        return view('examtypes.index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|max:40|min:2'
        ]);


        $exam = new ExamType();
        $exam->name = $request->name;
        $exam->save();
        flash('exam type created successfully')->success();
        return redirect()->route('examtypes.index');
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
        $exam = ExamType::findOrFail($id);
        return view('examtypes.edit',compact('exam'));
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
            'name' => 'required|max:40|min:2|unique:groups,name,'.$id
        ]);

        $exam = ExamType::findOrFail($id);
        $exam->name = $request->name;
        $exam->save();

        flash('exam type updated successfully')->success();
        return redirect()->route('examtypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = ExamType::findOrFail($id);
         $exam->delete();

         flash('ExamType delete successfully')->error();
        return back();
    }
}
