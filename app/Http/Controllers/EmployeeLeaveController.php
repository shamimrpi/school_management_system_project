<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeLeave;
use App\Models\User;
use App\Models\LeavePurpose;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EmployeeLeaveRequest;
class EmployeeLeaveController extends Controller
{
    public function index()
    {
        $employees = EmployeeLeave::all();

        return view('employee_leave.index',compact('employees')); 
    }

    public function create()
    {

        $data['employees'] = User::where('usertype','employee')->groupBy('id','DESC')->get();
        $data['leave_purposes'] = LeavePurpose::all();
        return view('employee_leave.create',$data);
    }
    public function store(Request $r)
    {

        $this->validate($r,[
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'leave_purpose_id' => 'required'
        ],[
            'start_date.required' => 'This field is must be required',
            'end_date.required' => 'This field is must be Required',
            'employee_id.required'=> 'Employee Name is required',
            'leave_purpose_id.required'=> 'Leave Purpose is required',
            ]);
        
         

        $employee = User::where('id',$r->employee_id)->first();
        $leave = new EmployeeLeave();
        $leave->employee_id = $employee->id;
        $leave->start_date = $r->start_date;
        $leave->end_date = $r->end_date;
        $leave->leave_purpose_id = $r->leave_purpose_id;
        $leave->save();
         flash('Leave created successfully')->success();
       
        
        return redirect()->route('emaployee.leave');
    }
    public function edit($id)
    {
         $data['leave'] = EmployeeLeave::where('id',$id)->first();
         $data['employees'] = User::where('usertype','employee')->get();
         $data['leave_purposes'] = LeavePurpose::all();
          return view('employee_leave.edit',$data);
    }
    public function editStore(Request $r,$id)
    {
        
          $this->validate($r,[
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'leave_purposes_id' => 'required'
        ]);
        $leave = EmployeeLeave::where('id',$id)->first();
        $leave->employee_id = $r->employee_id;
        $leave->start_date  = $r->start_date;
        $leave->end_date    = $r->end_date;
        $leave->leave_purposes_id = $r->leave_purpose_id;
        $leave->save();
         flash('Leave updated successfully')->success();
         return redirect()->route('emaployee.leave'); 
    }

    public function destroy($id)
    {
        $leave = EmployeeLeave::findOrFail($id);
        $leave->delete();
      
        flash('Leave deleted successfully')->success();
        return redirect()->route('emaployee.leave'); 
    }
    
}
