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
class EmployeeSalaryController extends Controller
{
    public function index()
    {
        
        $data['employees'] = User::with('gender')->where('usertype','employee')->get();
        return view('employee_salary.index',$data);
    }
    public function increment($id)
    {

        $employee_salary = User::find($id);
        return view('employee_salary.increment',compact('employee_salary'));
    }
    public function store(Request $r,$id)
    {  
        $employee = User::where('id',$id)->first();
        $previous_salary = $employee->salary;
       
        $present_salary  =(float)$previous_salary + (float)$r->increment_salary;
        $employee->salary = $present_salary;
     
        $employee->save();
        $salary = new EmployeeSalaryLog();
        $salary->employee_id = $employee->id;
        $salary->present_salary = $employee->salary;
        $salary->previous_salary = $previous_salary;
        $salary->increment_salary = $r->increment_salary;
        $salary->effective_date = date('Y-m-d',strtotime($r->effective_date));
        $salary->save();

         flash('employee increment successfully')->success();
       
        
            return redirect()->route('emaployee.salary');

    }
    public function details($id)
    {
        $employee = User::where('id',$id)->first();
        $employee_salary = EmployeeSalaryLog::where('employee_id',$id)->get();
        return view('employee_salary.details',compact(['employee_salary','employee']));
    }
}
