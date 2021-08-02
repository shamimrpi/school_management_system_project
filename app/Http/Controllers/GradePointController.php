<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarksGrade;

class GradePointController extends Controller
{
    //
    public function index(){
        $data = MarksGrade::orderBy('grade_point','DESC')->get();
        return view('marks_grade.index',compact('data'));
    }
    public function create(){
        
        return view('marks_grade.create');
    }
    public function store(Request $r){
        $this->validate($r,[
            'grade_name' => 'required',
            'grade_point' => 'required',
            'start_marks' => 'required',
            'end_marks' => 'required',
            'start_point' => 'required',
            'end_point' => 'required',
            'remarks' => 'required',
        ],[
            'grade_name.required'=> 'Grade Name Must be Required',
            'grade_point.required'=> 'Grade Point Must be Required',
            'start_marks.required'=> 'Start Marks Must be Required',
            'end_marks.required'=> 'End Marks Must be Required',
            'start_point.required'=> 'Start Point Must be Required',
            'end_point.required'=> 'End Point Must be Required',
            'remarks.required'=> '',
        ]);
        $markGrade = new MarksGrade();
        $markGrade->grade_name  = $r->grade_name;
        $markGrade->grade_point = $r->grade_point;
        $markGrade->start_marks = $r->start_marks;
        $markGrade->end_marks   = $r->end_marks;
        $markGrade->start_point = $r->start_point;
        $markGrade->end_point   = $r->end_point;
        $markGrade->remarks     = $r->remarks;
        $markGrade->save();

        flash('Marks grade created successfully')->success();
                return redirect()->route('marks.grade');
       
    }
    public function edit($id){
        $data = MarksGrade::where('id',$id)->first();
        return view('marks_grade.edit',compact('data'));
    }
    public function editStore(Request $r,$id){
        $this->validate($r,[
            'grade_name' => 'required',
            'grade_point' => 'required',
            'start_marks' => 'required',
            'end_marks' => 'required',
            'start_point' => 'required',
            'end_point' => 'required',
            'remarks' => 'required',
        ],[
            'grade_name.required'=> 'Grade Name Must be Required',
            'grade_point.required'=> 'Grade Point Must be Required',
            'start_marks.required'=> 'Start Marks Must be Required',
            'end_marks.required'=> 'End Marks Must be Required',
            'start_point.required'=> 'Start Point Must be Required',
            'end_point.required'=> 'End Point Must be Required',
            'remarks.required'=> '',
        ]);

            $data = MarksGrade::where('id',$id)->delete();
          

            $markGrade = new MarksGrade();
            $markGrade->grade_name  = $r->grade_name;
            $markGrade->grade_point = $r->grade_point;
            $markGrade->start_marks = $r->start_marks;
            $markGrade->end_marks   = $r->end_marks;
            $markGrade->start_point = $r->start_point;
            $markGrade->end_point   = $r->end_point;
            $markGrade->remarks     = $r->remarks;
            $markGrade->save();

        flash('Marks grade updated successfully')->success();
                return redirect()->route('marks.grade');

    }
}
