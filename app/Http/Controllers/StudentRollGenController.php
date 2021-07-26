<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Student_class;
use App\Models\AssignStudent;

class StudentRollGenController extends Controller
{
    public function index()
    {
        $data['years'] = Year::all();
        $data['classes'] = Student_class::all();
        return view('student_roll.index',$data);
    }
    public function getStudent(Request $r)
    {
        $allData = AssignStudent::with(['student'])->where('year_id',$r->year_id)->where('student_class_id',$r->student_class_id)->get();
        /*dd($allData->toArray());*/
        return response()->json($allData);
    }
    public function store(Request $r)
    {
       
       $year_id = $r->year_id;
       $student_class_id = $r->student_class_id;
       if($r->student_id != NULL ){
        for ($i=0; $i <count($r->student_id) ; $i++) 
        { 
            AssignStudent::where('year_id',$year_id)->where('student_class_id',$student_class_id)->where('student_id',$r->student_id[$i])->update(['roll' =>$r->roll[$i] ]);
        }
       }
       else{
        flash('no student found')->error();
        return back();
       }
      flash('Roll generated successfully')->success();
        return back();
    }
}
