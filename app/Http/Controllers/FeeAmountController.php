<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeCategoryAmount;
use App\Models\Fee_category;
use App\Models\Student_class;


class FeeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsef
     */
    public function index()
    {
        $classes = Student_class::all();
        $f_cats = Fee_category::all();
        $all_data = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('fee_amounts.index',compact('all_data','classes','f_cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Student_class::all();
        $f_cats = Fee_category::all();
        $create_data = 'create_data';
        return view('fee_amounts.edit_create',compact(['create_data','classes','f_cats']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*  return $request->all();
          //validation
        $this->validate($request,[
            'amount[]' => 'required|max:10|min:2',
            'fee_category_id' => 'required',
            'student_class_id[]' => 'required'
        ]);*/
        $countClass = count($request->student_class_id);
        if($countClass != NULL){
             for ($i=0; $i <$countClass; $i++) { 
                $f_amount = new FeeCategoryAmount();
                $f_amount->fee_category_id = $request->fee_category_id;
                $f_amount->amount = $request->amount[$i];
                $f_amount->student_class_id = $request->student_class_id[$i];
                $f_amount->save();
            }

        }
        flash('Fee Amount Category created successfully')->success();
                return redirect()->route('fee_amounts.index');
       

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fee_category_id)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
    }
}
