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
	    		$data = AssignSubject::where('student_class_id',$student_class_id)->whereNotIn('subject_id',$request->subject_id)->delete();
	    		
		    		foreach($request->subject_id as $key=>$value){
		    			$assignSubjectExist = AssignSubject::where('subject_id',$request->subject_id[$key])->where('student_class_id',$request->student_class_id)->first();
		    			
		    			if($assignSubjectExist){
		    				$assignSubject = $assignSubjectExist;
		    			}else{
		    				$assignSubject = new AssignSubject();
		    			}
		    			$assignSubject->student_class_id = $request->student_class_id;
		                $assignSubject->subject_id       = $request->subject_id[$key];
		                $assignSubject->full_mark        = $request->full_mark[$key];
		                $assignSubject->pass_mark        = $request->pass_mark[$key];
		                $assignSubject->subjective_mark  = $request->subjective_mark[$key];
		                $assignSubject->save();
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
