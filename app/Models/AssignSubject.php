<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    protected $fillable = ['student_class_id','subject_id','full_mark','pass_mark','subjective_mark'];

    public function subject()
    {
    	return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function studentClass()
    {
    	return $this->belongsTo(Student_class::class,'student_class_id','id');
    }
   

}
