<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountStudentFee extends Model
{
    use HasFactory;
  
  public function student(){
    return $this->belongsTo(User::class,'student_id','id');
  }
  public function studentClass(){
   return $this->belongsTo(Student_class::class,'student_class_id','id');
  }


  public function discount(){
    return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
  }
  public function feetype(){
    return $this->belongsTo(Fee_category::class,'fee_category_id','id');
  }
  public function years(){
    return $this->belongsTo(Year::class,'year_id','id');
  }
}
