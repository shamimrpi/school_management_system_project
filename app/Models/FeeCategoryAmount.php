<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fee_category;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fee_category()
    {
    	return $this->belongsTo(Fee_category::class,'fee_category_id','id');
    }

    public function studentClass()
    {
    	return $this->belongsTo(Student_class::class,'student_class_id','id');
    }
}
