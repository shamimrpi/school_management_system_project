<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignSubject;
class DefaultController extends Controller
{
    public function getSubject(Request $r){
        $student_class_id = $r->student_class_id;
        $allData = AssignSubject::with(['subject'])->where('student_class_id',$student_class_id)->get();

        return response()->json($allData);
    }
    
}
