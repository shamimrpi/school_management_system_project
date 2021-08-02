<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Student_class;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\StudentMark;

class GetMarkController extends Controller
{
    public function getMark(){
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = Student_class::all();
        $data['examtypes'] = ExamType::all();
        return view('marks.index',$data);
    }

    public function getStudentMark(Request $r){
        $student_class_id = $r->student_class_id;
        $year_id = $r->year_id;
        $allData = AssignStudent::with(['student'])->where('year_id',$year_id)->where('student_class_id',$student_class_id)->get();
        return response()->json($allData);
    }
    public function storeMarks(Request $r){
        
        $countStudent       = $r->student_id;
        $student_class_id   = $r->student_class_id;
        $year_id            = $r->year_id;
        $assign_subject_id  = $r->assign_subject_id;
        $exam_type_id       = $r->exam_type_id;


        $data = StudentMark::where('student_class_id',$student_class_id)
                ->where('year_id',$year_id)
                ->where('assign_subject_id',$assign_subject_id)
                ->where('exam_type_id',$exam_type_id)->first();

        /*dd($data);*/

            if($data != NULL){
                        flash('Marks already Posted')->error();
                        return back();
                    }
                    
            else{
                if($countStudent){
                     for ($i=0; $i < count($r->student_id) ; $i++) { 
                        $data = new StudentMark();
                        $data->year_id           = $r->year_id;
                        $data->student_class_id  = $r->student_class_id;
                        $data->assign_subject_id = $r->assign_subject_id;
                        $data->student_id        = $r->student_id[$i];
                        $data->exam_type_id      = $r->exam_type_id;
                        $data->marks             = $r->marks[$i];
                        $data->id_no             = $r->id_no[$i];
                        $data->save();
                        }
                    }
             flash('Marks saved successfully')->success();
                return back();
            }
        
       
    }
    public function edit(){
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = Student_class::all();
        $data['examtypes'] = ExamType::all();
        return view('marks.edit',$data);
    }
    public function getStudentEditMark(Request $r){
      
        $student_class_id = $r->student_class_id;
        $year_id = $r->year_id;
        $assign_subject_id = $r->assign_subject_id;
        $exam_type_id = $r->exam_type_id;
        $allData = StudentMark::with(['student'])->where('year_id',$year_id)->where('student_class_id',$student_class_id)->where('assign_subject_id',$assign_subject_id)->get();

        return response()->json($allData);
    }
    public function storeEditMarks(Request $r){
        $student_class_id = $r->student_class_id;
        $year_id = $r->year_id;
        $assign_subject_id = $r->assign_subject_id;
        $exam_type_id = $r->exam_type_id;

        $data =StudentMark::where('student_class_id',$student_class_id)->where('year_id',$year_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->delete();


                        for ($i=0; $i < count($r->student_id) ; $i++) { 
                            $getMark = new StudentMark();
                            $getMark->year_id              = $year_id;
                            $getMark->student_class_id  = $student_class_id;
                            $getMark->assign_subject_id = $assign_subject_id;
                            $getMark->exam_type_id      = $exam_type_id;
                            $getMark->student_id        = $r->student_id[$i];
                            $getMark->marks             = $r->marks[$i];
                            $getMark->id_no             = $r->id_no[$i];
                            $getMark->save();
                        }
        flash('Marks updated successfully')->success();
                return back();
            
        
        
    }
}
                    