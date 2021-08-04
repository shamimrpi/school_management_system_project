<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountEmployeSalary;
use App\Models\EmployeeAttendance;

class AcctEmployeeController extends Controller
{
    
    public function index(){
        $data = AccountEmployeSalary::with(['user'])->orderBy('date','DESC')->get();
        
      return view('acct_employee_salary.index',compact('data'));
    }
    public function create(){
        return view('acct_employee_salary.create');
    }
    public function getData(Request $r){
        $date = date('Y-m',strtotime($r->date));
        if($date != NULL){
            $where[] = ['date','like',$date.'%'];
        }
         $month = date('m',strtotime($r->date));
         $year = date('Y',strtotime($r->date));
        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
           $html['thsource']  = '<th>SL</th>';
           $html['thsource'] .= '<th>ID No.</th>';
           $html['thsource'] .= '<th>Employee Name</th>';
           $html['thsource'] .= '<th>Basic Salary</th>';
           $html['thsource'] .= '<th>Payable Salary</th>';
           $html['thsource'] .= '<th>Select</th>';
           foreach($data as $key => $value){
                $acct_salary = AccountEmployeSalary::where('employee_id',$value->employee_id)->where('date',$date)->first();
                if($acct_salary !=NUll){
                $checked = 'checked';
                   }
                   else{
                     $checked = '';
                   }
                       $totalAttend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$value->employee_id)->get();
                       
                       $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
                       $html[$key]['tdsource'] .= '<td>'.$value->user->id_no.'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
                       $html[$key]['tdsource'] .= '<td>'.$value->user->name.'</td>';
                       $html[$key]['tdsource'] .= '<td>'.$value->user->salary.'TK'.'</td>';
                           $absentCount = count($totalAttend->where('attendance_status','Absent'));
                           $presentCount = count($totalAttend->where('attendance_status','Present'));
                           $leaveCount = count($totalAttend->where('attendance_status','Leave'));
                           $payableDays = (float)$presentCount+(float)$leaveCount;
                           $salary = $value->user->salary;
                           $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                           $salaryPerday = (float)$salary/$totalDays;
                           $payableSalary =(float)$payableDays*(float)$salaryPerday;
                       $html[$key]['tdsource'] .= '<td>'.$payableSalary.'<input type="hidden" name="amount[]" value="'.$payableSalary.'">'.'</td>';   
                       $html[$key]['tdsource'] .= '<td>'.'<input type="hidden" name="employee_id[]" value="'.$value->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" value="'.$key.'" '.$checked.' style="transform:scale(1.5);margin-left:10px;" >' . '</td>';

             }
              return response()->json(@$html);

    }
    public function store(Request $r){
        $date = date('Y-m',strtotime($r->date));
       
          $data = AccountEmployeSalary::where('date',$date)->delete();
 
       $checkdata = $r->checkmanage;
       if($checkdata != NULL){
        for ($i=0; $i <count($checkdata) ; $i++) { 
            $data = new AccountEmployeSalary();
            $data->date = $date;
            $data->employee_id = $r->employee_id[$checkdata[$i]];
            $data->amount = $r->amount[$checkdata[$i]];
            $data->save();
        }
       }
       if(!empty(@$data) || empty($checkdata)){
            flash('data inserted Successfully')->success();
            return redirect()->route('employee.salary.view');
       }
       else{
        flash('Sorry! Data not save')->error();
            return back();
       }
    }
}
