<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student_class;
use App\Models\Year;

class AssignStudent extends Model
{
    use HasFactory;
      protected $guarded = [];

      public function student(){
      	return $this->belongsTo(User::class,'student_id','id');
      }
      public function studentClass()
    	{
    		return $this->belongsTo(Student_class::class,'student_class_id','id');
    	}
     public function year()
    	{
    		return $this->belongsTo(Year::class,'year_id','id');
    	}
       public function discount()
      {
        return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
      }
      public function shift(){
         return $this->belongsTo(Shift::class,'shift_id','id');
      }
      public function group(){
         return $this->belongsTo(Group::class,'group_id','id');
      }
      
}
