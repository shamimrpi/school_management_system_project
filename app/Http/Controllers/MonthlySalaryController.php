<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EmployeeLeaveRequest;
use PDF;

class MonthlySalaryController extends Controller
{
    //

    public function index(){
        return view('monthly_salary.index');
    }
    public function getSalary(Request $r){

      $date = date('Y-m',strtotime($r->date));
       if($date != ''){
            $where[] = ['date','like',$date.'%'];
        }


       $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        
       $html['thsource']  = '<th>SL</th>';
       $html['thsource'] .= '<th>ID No.</th>';
       $html['thsource'] .= '<th>Employee Name</th>';
       $html['thsource'] .= '<th>Basic Salary</th>';
       $html['thsource'] .= '<th>Payable Salary</th>';
       $html['thsource'] .= '<th>Action</th>';

       foreach ($data as $key => $attend) {
           $attendance = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
         
           $absentCount  = count($attendance->where('attendance_status','Absent'));
           $presentCount = count($attendance->where('attendance_status','Present'));
           $leaveCount   = count($attendance->where('attendance_status','Leave'));
           $payableDays  = (float)$presentCount+(float)$leaveCount;

           $month = date('m',strtotime($r->date));
           $year  = date('Y',strtotime($r->date));
           $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
         
              
                
           $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
           $html[$key]['tdsource'] .= '<td>'.$attend->user->id_no.'</td>';
           $html[$key]['tdsource'] .= '<td>'.$attend->user->name.'</td>';
           $html[$key]['tdsource'] .= '<td>'.$attend->user->salary.'</td>';
           $salary           = (float)$attend['user']['salary'];

           $salaryPerday     = (float)$salary/$totalDays;
           $payableSalary      = $payableDays*$salaryPerday;

           $html[$key]['tdsource'] .= '<td>'.$payableSalary.'TK'.'</td>';
           $html[$key]['tdsource'] .= '<td>';
           $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-success" title="Salary Pay Slip" target="_blank" href="'.route("salary.payslip",$attend->employee_id).'?date='.$date.'">Salary PaySlip</a>';
           $html[$key]['tdsource'] .= '</td>';
       }
       return response()->json(@$html);
    }
    public function paySlip(Request $r,$employee_id)
    {
        
        $data = EmployeeAttendance::with(['user'])->where('employee_id',$employee_id)->first();
         $date = date('Y-m',strtotime($r->date));
           if($date != ''){
                $where[] = ['date','like',$date.'%'];
            }

        $data = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$data->employee_id)->first();
       
     
        $pdf = PDF::loadView('monthly_salary.monthly_salary_payslip_pdf',compact(['data']));
   
        return $pdf->download('document.pdf');

    }
  

}
