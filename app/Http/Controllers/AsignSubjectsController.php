<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\Subject;
use App\Models\Student_class;


class AsignSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['asignsubjects'] = AssignSubject::select('student_class_id')->groupBy('student_class_id')->get();
        return view('asignsubjects.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Student_class::all();
        $subjects = Subject::all();
        $create_data = 'create_data';
        return view('asignsubjects.create',compact(['create_data','classes','subjects']));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $countClass = count($request->subject_id);
        if($countClass != NULL){
             for ($i=0; $i <$countClass; $i++) { 
                $a_subject = new AssignSubject();
                $a_subject->student_class_id = $request->student_class_id;
                $a_subject->subject_id = $request->subject_id[$i];
                $a_subject->full_mark = $request->full_mark[$i];
                $a_subject->pass_mark = $request->pass_mark[$i];
                $a_subject->subjective_mark = $request->subjective_mark[$i];
                $a_subject->save();
            }

        }
        flash('Assign Subject created successfully')->success();
                return redirect()->route('assign.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
