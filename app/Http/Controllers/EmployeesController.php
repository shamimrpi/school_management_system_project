<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use PDF;
class EmployeesController extends Controller
{
    public function index()
    {
        
       
        $data['employees'] = User::with('gender')->where('usertype','employee')->get();
        return view('employees.index',$data);
    }
    public function create()
    {

        $data['religions'] = Religion::all();
        $data['genders'] = Gender::all();
        $data['employee_salary'] = EmployeeSalaryLog::all();
        $data['designations'] = Designation::all();
        return view('employees.create',$data);
    }
    public function store(Request $r)
    {

            $this->validate($r,[
                'name'     => 'required',
                'password' => 'required',
                'f_name'   => 'required',
                'm_name'   => 'required',
                'mobile'   => 'required',
                'gender_id' => 'required',
                'address' => 'required',
                'religion_id' => 'required',
                'salary' => 'required',
                'designation_id' => 'required',
                'dob' => 'required',
                'join_date' => 'required',
                'effective_date' => 'required',
                'designation_id' => 'required',
                'image' => ''
            ]);


                $checkYear = date('Y',strtotime($r->join_date));
                $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();
                if($employee == NULL){
                    
                    $employee = User::orderBy('id','DESC')->first();
                    $id_no = $employee->id;
                    $id_no = $id_no+1;
                }
                else{
                    $id_no = $employee->id;
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
            $employee = new User();
            $employee->id_no = $id_no;
            $employee->name = $r->name;
            $employee->code = $code;
            $employee->password = Hash::make($code);
            $employee->f_name = $r->f_name;
            $employee->m_name = $r->m_name;
            $employee->usertype = 'employee';
            $employee->mobile = $r->mobile;
            $employee->gender_id = $r->gender_id;
            $employee->address = $r->address;
            $employee->religion_id = $r->religion_id;
            $employee->salary = $r->salary;
            $employee->designation_id = $r->designation_id;
            $employee->dob = date('Y-m-d',strtotime($r->dob));
            $employee->join_date = date('Y-m-d',strtotime($r->join_date));
            if($r->file('image')){
                $file = $r->file('image');
                $fileName = rand(0000,9999).$file->getClientOriginalName();
                $file->move(public_path('upload/employee_img'),$fileName);
                $employee['image'] = $fileName;
            }
            $employee->save();
            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $employee->id;
            $employee_salary->previous_salary = $r->salary;
            $employee_salary->present_salary = $r->salary;
            $employee_salary->effective_date = date('Y-m-d',strtotime($r->join_date));
            $employee_salary->increment_salary = '0';
            $employee_salary->save();
            flash('employee created successfully')->success();
       
        
             return redirect()->route('emaployee.all');


             

    }
      public function edit(Request $r,$id)
        {   
            $data['religions'] = Religion::all();
            $data['genders'] = Gender::all();
            $data['employee_salary'] = EmployeeSalaryLog::all();
            $data['designations'] = Designation::all();
            $data['employee'] = User::where('id',$id)->where('usertype','employee')->first();
            /*dd($data['student']->toArray());*/
            return view('employees.edit',$data);
        }
        public function update(Request $r,$id)
    {
       
         $employee = User::with('gender')->where('id',$id)->first();
       
         
         
           
            $employee->name = $r->name;
            $employee->f_name = $r->f_name;
            $employee->m_name = $r->m_name;
            $employee->usertype = 'employee';
            $employee->mobile = $r->mobile;
            $employee->gender_id = $r->gender_id;
            $employee->address = $r->address;
            $employee->religion_id = $r->religion_id;
            $employee->designation_id = $r->designation_id;
            $employee->dob = date('Y-m-d',strtotime($r->dob));
            $employee->join_date = date('Y-m-d',strtotime($r->join_date));
            if($r->file('image')){
                $file = $r->file('image');
                @unlink(public_path('upload/employee_img/'.$employee->image));
                $fileName = rand(0000,9999).$file->getClientOriginalName();
                $file->move(public_path('upload/employee_img'),$fileName);
                $employee['image'] = $fileName;
            }
            $employee->save();
            flash('employee update successfully')->success();
       
        
             return redirect()->route('emaployee.all');
        


    }
    public function details($id)
    {
        $data['employee'] = User::where('id',$id)->first();
       
       
        $pdf = PDF::loadView('employees.details-pdf',$data);
   
        return $pdf->download('details.pdf');
    }
   
    
}
