<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Student_class;
use App\Models\Group;
use App\Models\Shift;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentManageController extends Controller
{
    //
    public function index(){
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = Student_class::all();
        $data['year_id'] = Year::orderBy('id','DESC')->first()->id;
        $data['student_class_id'] = Student_class::orderBy('id','ASC')->first()->id;
        $data['a_students'] = AssignStudent::where('year_id',$data['year_id'])->where('student_class_id',$data['student_class_id'])->get();
        return view('students.index',$data);
    }
    public function getData(Request $r){
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = Student_class::all();
        $data['year_id'] = $r->year_id;
        $data['student_class_id'] = $r->student_class_id;
        $data['a_students'] = AssignStudent::where('year_id',$r->year_id)->where('student_class_id',$r->student_class_id)->get();
        return view('students.index',$data);
    }

    public function create()
    {
    	$data['years'] = Year::all();
    	$data['classes'] = Student_class::all();
    	$data['groups'] = Group::all();
    	$data['shifts'] = Shift::all();
    	return view('students.create_edit',$data);
    }
    public function store(Request $r)
    {

    			$checkYear = Year::find($r->year_id);
    			$checkYear = $checkYear->name;
    			$student = User::where('usertype','student')->orderBy('id','DESC')->first();
                if($student == NULL){
                    
                    $student = User::orderBy('id','DESC')->first();
                    $id_no = $student->id;
                    $id_no = $id_no+1;
                }
                else{
                    $id_no = $student->id;
                    $id_no = $id_no+1;
                }
                
                    if($id_no <0)
                    {
                        $id_no = $checkYear.'000'.$id_no;
                    }
                    elseif($id_no <10){
                         $id_no = $checkYear.'00'.$id_no;
                    }
                    else{
                        $id_no = $checkYear.'0'.$id_no;
                    }
               

            $code = rand(0000,9999);   
            $user = new User();
            $user->id_no = $id_no;
            $user->name = $r->name;
            $user->code = $code;
            $user->password = Hash::make($code);
            $user->f_name = $r->f_name;
            $user->m_name = $r->m_name;
            $user->usertype = 'student';
            $user->mobile = $r->mobile;
            $user->gender = $r->gender;
            $user->address = $r->address;
            $user->religion = $r->religion;
            $user->religion = $r->religion;
            $user->dob = date('Y-m-d',strtotime($r->dob));
            if($r->file('image')){
                $file = $r->file('image');
                $fileName = rand(0000,9999).$file->getClientOriginalName();
                $file->move(public_path('upload/studentImage'),$fileName);
                $user['image'] = $fileName;
            }
            $user->save();
            $a_student = new AssignStudent();
            $a_student->student_id = $user->id;
            $a_student->year_id = $r->year_id;
            $a_student->group_id = $r->group_id;
            $a_student->shift_id = $r->shift_id;
            $a_student->student_class_id = $r->student_class_id;
            $a_student->save();

            $d_student = new DiscountStudent();
            $d_student->discount = $r->discount;
            $d_student->assign_student_id = $a_student->id;
            $d_student->save();

            flash('student created successfully')->success();
       
        
             return back();


    		 

    }

    public function edit(Request $re,$id)
    {

    }
    public function update(Request $r,$id)
    {

    }

}