<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountEmployeSalary;
use App\Models\AccountStudentFee;
use App\Models\OthersCost;
use App\Models\Year;
use App\Models\ExamType;
use App\Models\Student_class;
use App\Models\StudentMark;
use App\Models\MarksGrade;


class MonthlyYearlyReportController extends Controller
{
    //

    public function index(){
       return view('profit.index');
    }
    public function getData(Request $r){
      $start_date = date('Y-m',strtotime($r->start_date));
      $end_date = date('Y-m',strtotime($r->end_date));
      $s_date = date('Y-m-d',strtotime($r->start_date));
      $e_date = date('Y-m-d',strtotime($r->end_date));

      $student_fee = AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
      $emp_salary = AccountEmployeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');
      $other_cost = OthersCost::whereBetween('date',[$s_date,$e_date])->sum('amount');
      $totalCost = $emp_salary+$other_cost;
      $profit = $student_fee-$totalCost;

                $html['thsource']  = '<th>Students Fee</th>';
                $html['thsource'] .= '<th>Other Cost</th>';
                $html['thsource'] .= '<th>Employee Salary</th>';
                $html['thsource'] .= '<th>Total Cost</th>';
                $html['thsource'] .= '<th>Profit</th>';
                


                $html['tdsource']   = '<td>'.$student_fee.'</td>';
                $html['tdsource']  .= '<td>'.$other_cost.'</td>';
                $html['tdsource']  .= '<td>'.$emp_salary.'</td>';
                $html['tdsource']  .= '<td>'.$totalCost.'</td>';
                $html['tdsource']  .= '<td>'.$profit.'</td>';
             

                return response()->json(@$html);


    }
   
   public function getSearch(){
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = Student_class::all();
        $data['examtypes'] = ExamType::all();
        return view('marksheet.index',$data);
   }
   public function getMarkSheet(Request $r){
        $year_id = $r->year_id;
        $student_class_id = $r->student_class_id;
        $exam_type_id = $r->exam_type_id;
        $id_no = $r->id_no;

        $count_fail = StudentMark::where('year_id',$year_id)->where('student_class_id',$student_class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
        $singleStudent = StudentMark::where('year_id',$year_id)->where('student_class_id',$student_class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();

        if($singleStudent == true){
            $allMarks = StudentMark::with(['assign_subject','year',])->where('year_id',$year_id)->where('student_class_id',$student_class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();

            $allGrades = MarksGrade::orderBy('grade_point','DESC')->get();
            return view('marksheet.report-pdf',compact(['allGrades','allMarks','count_fail','student_class_id','year_id']));
        }
        else{
            flash('data not match')->error();
            return back();
        }

   }
}
