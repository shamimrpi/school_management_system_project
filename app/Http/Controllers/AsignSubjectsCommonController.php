<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\Subject;
use App\Models\Student_class;

class AsignSubjectsCommonController extends Controller
{
    public function edit($student_class_id)
    {
    	$classes = Student_class::all();
    	$subjects = Subject::all();
    	$editData = AssignSubject::where('student_class_id',$student_class_id)->orderBy('subject_id','asc')->get();
    	return view('asignsubjects.edit',compact(['classes','subjects','editData']));
    }

	    public function update(Request $request,$student_class_id)
	    {
	    	
	    	if($request->subject_id == NULL){
	    		return redirect()->back()->with('errors','You can not select any subject');
	    	}
	    	else{
	    		AssignSubject::where('student_class_id',$student_class_id)->delete();
	    		$countClass = count($request->subject_id);
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
	    		 flash('Assign Subject update successfully')->success();
	               return redirect()->route('assign.index'); 
	    }

    public function view($student_class_id)
    {
    	$classes = Student_class::all();
    	$subjects = Subject::all();
    	$viewData = AssignSubject::where('student_class_id',$student_class_id)->get();
    	return view('asignsubjects.view',compact(['viewData','classes','subjects']));
    }
}
