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
use App\Models\Religion;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;
use App\Models\AccountStudentFee;
use App\Models\Fee_category;
use App\Models\FeeCategoryAmount;

class AcctStudentFeeController extends Controller
{
    public function index(){

        $allData = AccountStudentFee::with(['student'])->orderBy('id','DESC')->get();
        return view('account_student_fee.index',compact('allData'));
    }
    public function create(){

        $data['years'] = Year::orderBy('name','DESC')->get();
        $data['classes'] = Student_class::all();
        $data['fee_categories'] = Fee_category::all();
        return view('account_student_fee.create',$data);
    }
    public function store(Request $r){
        
       
       $month = $r->month;
       $year = $r->year;
       
          $data = AccountStudentFee::where('year_id',$r->year_id)->where('student_class_id',$r->student_class_id)->where('fee_category_id',$r->fee_category_id)->where('month',$month)->where('year',$year)->get();
       
      
       $checkdata = $r->checkmanage;
       if($checkdata != NULL){
        for ($i=0; $i <count($checkdata) ; $i++) { 
            $data = new AccountStudentFee();
            $data->year_id = $r->year_id;
            $data->student_class_id = $r->student_class_id;
            $data->fee_category_id = $r->fee_category_id;
            $data->month = $month;
            $data->year = $year;
            $data->student_id = $r->student_id[$checkdata[$i]];
            $data->amount = $r->amount[$checkdata[$i]];
            $data->save();
        }
       }
       if(!empty(@$data) || empty($checkdata)){
            flash('data inserted Successfully')->success();
            return redirect()->route('student.fee.view');
       }
       else{
        flash('Sorry! Data not save')->error();
            return back();
       }

    }
    public function getData(Request $r){
         $year_id = $r->year_id;
         $student_class_id = $r->student_class_id;
         $fee_category_id = $r->fee_category_id;
         $month = date('Y',strtotime($r->date));
         $year = date('m',strtotime($r->date));
         $data = AssignStudent::with(['student'])->where('year_id',$year_id)->where('student_class_id',$student_class_id)->get();
         
           $html['thsource']  = '<th>SL</th>';
           $html['thsource'] .= '<th>ID No.</th>';
           $html['thsource'] .= '<th>Student Name</th>';
           $html['thsource'] .= '<th>Original Fee</th>';
           $html['thsource'] .= '<th>Discount Fee</th>';
           $html['thsource'] .= '<th>Payable Fee</th>';
           $html['thsource'] .= '<th>Select</th>';
           foreach($data as $key => $value){
                $studentFee = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->where('student_class_id',$student_class_id)->first();
                $acctStudentFee = AccountStudentFee::where('year_id',$year_id)->where('student_class_id',$student_class_id)->where('fee_category_id',$fee_category_id)->where('month',$month)->where('year',$year)->first();

               if($acctStudentFee !=NUll){
                $checked = 'checked';
               }
               else{
                 $checked = '';
               }
               $html[$key]['tdsource']  = '<td>'.($key+1).'<input type="hidden" name="fee_category_id" value="'.$fee_category_id.'">'. '</td>';
               $html[$key]['tdsource'] .= '<td>'.$value->student->id_no.'<input type="hidden" name="year_id" value="'.$value->year_id.'">'.'</td>';
               $html[$key]['tdsource'] .= '<td>'.$value->student->name.'<input type="hidden" name="student_class_id" value="'.$value->student_class_id.'">'.'</td>';
               $html[$key]['tdsource'] .= '<td>'.$studentFee->amount.'TK'.'<input type="hidden" name="month" value="'.$month.'">'.'</td>';
               $html[$key]['tdsource'] .= '<td>'.$studentFee->amount.'TK'.'<input type="hidden" name="year" value="'.$year.'">'.'</td>';
               $html[$key]['tdsource'] .= '<td>'.$value->discount->discount.'%'.'</td>';

               $originalfee = $studentFee->amount;
               $discount = $value->discount->discount;
               $discountablefee = $discount/100*$originalfee;
               $finalfee = (float)$originalfee-(float)$discountablefee;
               $html[$key]['tdsource'] .= '<td>'.'<input type="text" name="amount[]" value="'.$finalfee.'" class="form-control" readonly> '.'</td>';
               $html[$key]['tdsource'] .= '<td>'.'<input type="hidden" name="student_id[]" value="'.$value->student_id.'" >'.'<input type="checkbox" name="checkmanage[]" value="'.$key.'" '.$checked.' style="transform:scale(1.5);margin-left:10px">'.'</td>';

              }
              return response()->json(@$html);
          }
}