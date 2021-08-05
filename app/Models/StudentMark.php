<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;
     public function student(){
        return $this->belongsTo(User::class,'student_id','id');
      }
      public function assign_subject(){
         return $this->belongsTo(AssignSubject::class,'assign_subject_id','id');
      }
      public function year(){
        return $this->belongsTo(Year::class,'year_id','id');
      }
      public function studentClass(){
         return $this->belongsTo(Student_class::class,'student_class_id','id');
        }

}
