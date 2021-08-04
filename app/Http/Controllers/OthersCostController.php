<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OthersCost;

class OthersCostController extends Controller
{
    //

    public function index(){
        $data = OthersCost::orderBy('id','DESC')->get();
        return view('costs.index',compact('data'));
    }
    public function create(){
        return view('costs.create');
    }
    public function store(Request $r){

        $cost = new OthersCost();
        $cost->date = date('Y-m-d',strtotime($r->date));
        $cost->amount = $r->amount;
        $cost->description = $r->description;

            if($r->file('image')){
                $file = $r->file('image');
                $fileName = rand(0000,9999).$file->getClientOriginalName();
                $file->move(public_path('upload/document'),$fileName);
                $cost['image'] = $fileName;
            }
        $cost->save();

        flash('Data inserted successfully')->success();
                return redirect()->route('others.cost.view');

    }
     public function edit($id){

        $edit_data = OthersCost::find($id);
        return view('costs.edit',compact('edit_data'));
    }
    public function update(Request $r,$id){
            $cost = OthersCost::find($id);
            $cost->date = date('Y-m-d',strtotime($r->date));
            $cost->amount = $r->amount;
            $cost->description = $r->description;

            if($r->file('image')){
                $file = $r->file('image');
                $fileName = rand(0000,9999).$file->getClientOriginalName();
                $file->move(public_path('upload/document'),$fileName);
                $cost['image'] = $fileName;
            }
             $cost->save();
             flash('Data upated successfully')->success();
                return redirect()->route('others.cost.view');
    }
}
