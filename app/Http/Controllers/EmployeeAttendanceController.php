<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EmployeeLeaveRequest;
use Carbon\Carbon;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {

        $employees = EmployeeAttendance::select('date')->groupBy('date')->orderBy('date','DESC')->get();
        return view('employee_attendace.index',compact('employees'));
    }
    public function create()
    {

        $data['employees'] = User::where('usertype','employee')->orderBy('id','DESC')->get();
        
        return view('employee_attendace.create',$data);
    }
    public function store(Request $r)
    {   

         $attendances = EmployeeAttendance::where('date',$r->date)->get();
         foreach ($attendances as $key => $attendance) {
            
            if($attendance->date == $r->date){
                flash('date already inserted')->error();
                    return redirect()->route('emaployee.attendnace');
                }
             }
         
              $count = count($r->employee_id);
                for ($i=0; $i < $count; $i++) { 
                    $attendance_status = 'attendance_status'.$i;
                    $attendance = new EmployeeAttendance();
                    $attendance->date = date('Y-m-d',strtotime($r->date));
                    $attendance->employee_id = $r->employee_id[$i];
                    $attendance->attendance_status = $r->$attendance_status;
                    $attendance->save();
                     
                }
                 flash('Attendance inserted successfully')->success();
                    return redirect()->route('emaployee.attendnace');
      
       
      

    }
    public function edit($date)
    {
        $data['attendances'] = EmployeeAttendance::where('date',$date)->get();
        $data['employees'] = User::where('usertype','employee')->get();
        
        return view('employee_attendace.edit',$data);
    }
    public function editStore(Request $r,$date)
    {
    
        $attendances = EmployeeAttendance::where('date',$date)->delete();
        

         $count = count($r->employee_id);
        for ($i=0; $i < $count; $i++) { 
            $attendance_status = 'attendance_status'.$i;
            $attendance = new EmployeeAttendance();
            $attendance->date = $date;
            $attendance->employee_id = $r->employee_id[$i];
            $attendance->attendance_status = $r->$attendance_status;
            $attendance->save();
             
        }
         flash('Attendance updated successfully')->success();
            return redirect()->route('emaployee.attendnace');
    }
    public function details($date)
    {
       $attendances = EmployeeAttendance::where('date',$date)->get();
       /*dd($attendance->toArray());*/
       return view('employee_attendace.details',compact('attendances'));

    }
    public function attendMonth()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        return view('employee_attendace.attendance',$data);
    }
    public function montlyAttendance(Request $r){
        $date = date('Y-m',strtotime($r->date));
        if($date != ''){
            $where[] = ['date','like',$date.'%'];
        }
        $attendance = EmployeeAttendance::with('user')->where('employee_id',$r->employee_id)->where($where)->orderby('date','ASC')->get();
        
      
        return response()->json(@$attendance);


       
        
    }
}
