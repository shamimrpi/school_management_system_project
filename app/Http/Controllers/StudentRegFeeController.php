<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Student_class;
use App\Models\AssignStudent;
use App\Models\FeeCategoryAmount;
use PDF;
class StudentRegFeeController extends Controller
{
    
    public function index()
    {
        $data['years'] = Year::all();
        $data['classes'] = Student_class::all();

        return view('student_reg.index',$data);
    }
    public function getStudent(Request $r){
       $year_id = $r->year_id;
       $student_class_id = $r->student_class_id;
       $allStudent = AssignStudent::with(['discount','student'])->where('year_id',$year_id)->where('student_class_id',$student_class_id)->get();

       $html['thsource']  = '<th>SL</th>';
       $html['thsource'] .= '<th>ID No.</th>';
       $html['thsource'] .= '<th>Student Name</th>';
       $html['thsource'] .= '<th>Roll</th>';
       $html['thsource'] .= '<th>Registration Fee</th>';
       $html['thsource'] .= '<th>Discount Amount</th>';
       $html['thsource'] .= '<th>Fee(this student)</th>';
       $html['thsource'] .= '<th>Action</th>';

       foreach ($allStudent as $key => $value) {
           $registrationFee = FeeCategoryAmount::where('fee_category_id','1')->where('student_class_id',$value->student_class_id)->first();
         
           $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
           $html[$key]['tdsource'] .= '<td>'.$value->student->id_no.'</td>';
           $html[$key]['tdsource'] .= '<td>'.$value->student->name.'</td>';
           $html[$key]['tdsource'] .= '<td>'.$value->roll.'</td>';
           $html[$key]['tdsource'] .= '<td>'.$registrationFee->amount.'TK'.'</td>';
           $html[$key]['tdsource'] .= '<td>'.$value->discount->discount.'%'.'</td>';

           $originalfee = $registrationFee->amount;
           $discount = $value->discount->discount;
           $discountablefee = $discount/100*$originalfee;
           $finalfee = (float)$originalfee-(float)$discountablefee;

           $html[$key]['tdsource'] .= '<td>'.$finalfee.'TK'.'</td>';
           $html[$key]['tdsource'] .= '<td>';
           $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-success" title="Payslip" target="_blank" href="'.route('student.reg.fee.slip').'?student_class_id='.$value->student_class_id.'&student_id='.$value->student_id.' ">Fee Slip</a>';
           $html[$key]['tdsource'] .= '</td>';
       }
       return response()->json(@$html);

    }
    public function paySlip(Request $r){
        
        $student_class_id = $r->student_class_id;
        $student_id = $r->student_id;
        $allStudent['alldata'] = AssignStudent::with(['discount','student'])->where('student_class_id',$student_class_id)->where('student_id',$student_id)->first();
    /*    return view('student_reg.payslip-pdf',$allStudent);*/

        $pdf = PDF::loadView('student_reg.payslip-pdf',$allStudent);
   
        return $pdf->download('document.pdf');
    }
}
