<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeCategoryAmount;
use App\Models\Student_class;
use App\Models\Fee_category;


class FeeCatAmountsCommonController extends Controller
{
   
    public function edit($fee_category_id)

    {
    	$data["classes"] = Student_class::all();
        $data["f_cats"] =  Fee_category::all();
        $data["editData"] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('student_class_id','asc')->get();
      /*  dd($data['editData']->toArray());*/
        return view('fee_amounts.edit',$data);
    }

    public function update(Request $request,$fee_category_id)
    {
    	
    	if($request->student_class_id == NULL)
    	{
    		return redirect()->back()->with('errors','You can not select any item');
    	}
    	else{
    		FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
    		$countClass = count($request->student_class_id);
             for ($i=0; $i <$countClass; $i++) { 
                $f_amount = new FeeCategoryAmount();
                $f_amount->fee_category_id = $request->fee_category_id;
                $f_amount->amount = $request->amount[$i];
                $f_amount->student_class_id = $request->student_class_id[$i];
                $f_amount->save();
            }
    	}
    	flash('Fee Amount Category update successfully')->success();
                return redirect()->route('fee_amounts.index');
    }

    public function view(Request $request,$fee_category_id)
    {
    	$data["classes"] = Student_class::all();
        $data["f_cats"] =  Fee_category::all();
    	$data["editData"] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->get();
    	return view('fee_amounts.view',$data);
    }
}
