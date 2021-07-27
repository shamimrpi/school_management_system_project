<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\YearsController;
use App\Http\Controllers\FeeCategoriesController;
use App\Http\Controllers\FeeAmountController;
use App\Http\Controllers\FeeCatAmountsCommonController;
use App\Http\Controllers\ExamTypesController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\AsignSubjectsController;
use App\Http\Controllers\AsignSubjectsCommonController;
use App\Http\Controllers\DesignationsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\StudentManageController;
use App\Http\Controllers\StudentRollGenController;
use App\Http\Controllers\StudentRegFeeController;
use App\Http\Controllers\StudentMonthlyFeeController;
use App\Http\Controllers\ExamFeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'authenticate'])->name('login.store');

Route::middleware(['auth'])->group(function () {
    //

Route::prefix('admin')->group(function(){


	//Student Class route list
	Route::resource('/classes',ClassesController::class);

	//Shift route list
	Route::resource('/shifts',ShiftsController::class);

	//Group route list
	Route::resource('/groups',GroupsController::class);

	//Year route list
	Route::resource('/years',YearsController::class);

	//fee Categories route list
	Route::resource('/fee_categories',FeeCategoriesController::class);

	//fee Categories Amount  route list
	Route::resource('/fee_amounts',FeeAmountController::class)->except(['show','edit','update']);

	Route::get('/fee_amounts/{fee_category_id}/Catedit',[FeeCatAmountsCommonController::class,'edit'])->name('fee_amounts.edit');
	Route::put('/fee_amounts/{fee_category_id}/update',[FeeCatAmountsCommonController::class,'update'])->name('fee_amounts.update');

	Route::get('/fee_amounts/{fee_category_id}/view',[FeeCatAmountsCommonController::class,'view'])->name('fee_amounts.view');


	// exam type resource route define 
	Route::resource('/examtypes',ExamTypesController::class);
	// Subjects resource route define 
	Route::resource('/subjects',SubjectsController::class);

		//fee Categories Amount  route list
	Route::resource('/assign',AsignSubjectsController::class)->except(['show','edit','update']);

	Route::get('/asign/subjects/common/{student_class_id}/Catedit',[AsignSubjectsCommonController::class,'edit'])->name('asign.subjects.edit');
	Route::put('/asign/subjects/common/{student_class_id}/update',[AsignSubjectsCommonController::class,'update'])->name('asign.subjects.update');

	Route::get('/asign/subjects/common/{student_class_id}/view',[AsignSubjectsCommonController::class,'view'])->name('asign.subjects.view');

	Route::get('/asign/subjects/common/{student_class_id}/destroy',[AsignSubjectsCommonController::class,'destroy'])->name('asign.subjects.delete');


	// Designations resource route define 
	Route::resource('/designations',DesignationsController::class)->except('show');


	

	
	});
	
	// Student Manage Controller 
	Route::get('/student/all',[StudentManageController::class,'index'])->name('student.all');
	Route::get('/student/create',[StudentManageController::class,'create'])->name('student.create');
	Route::post('/student/store',[StudentManageController::class,'store'])->name('students.store');
	Route::get('/student/{student_id}/edit',[StudentManageController::class,'edit'])->name('student.edit');
	Route::put('/student/{student_id}/update',[StudentManageController::class,'update'])->name('student.update');
	Route::get('/student/class/year/wise',[StudentManageController::class,'getData'])->name('students.year.class.wise');
	Route::get('/student/{student_id}/show',[StudentManageController::class,'show'])->name('student.details');

	Route::get('/student/{student_id}/promotion',[StudentManageController::class,'promotion'])->name('student.promotion');

	Route::post('/student/{student_id}/promotion/update',[StudentManageController::class,'promotionStore'])->name('student.promotion.store');

	// users Controller route
	Route::get('/users/create',[UsersController::class,'create'])->name('users.create');
	Route::post('/users/store',[UsersController::class,'store'])->name('users.store');
	Route::get('users/{id}/edit',[UsersController::class,'edit'])->name('users.edit');
	Route::put('users/{id}/update',[UsersController::class,'update'])->name('users.update');
	Route::get('/users',[UsersController::class,'index'])->name('users');
	Route::get('/logout',[LoginController::class,'logout'])->name('logout');
	Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard');

	Route::get('/student_roll',[StudentRollGenController::class,'index'])->name('student.roll.gen');
	Route::post('/student_roll/store',[StudentRollGenController::class,'store'])->name('student.roll.gen.store');
	Route::get('/student_roll/get_student',[StudentRollGenController::class,'getStudent'])->name('student.roll.gen.get_student');
	// registration fee controllers
	Route::get('/student/reg/fee',[StudentRegFeeController::class,'index'])->name('student.reg.fee');
	Route::get('/student/reg/fee/getstudent',[StudentRegFeeController::class,'getStudent'])->name('student.reg.fee.getStudent');
	Route::get('/student/registration/fee',[StudentRegFeeController::class,'paySlip'])->name('student.reg.fee.slip');

		// Monthly fee controllers
	Route::get('/monthly/fee',[StudentMonthlyFeeController::class,'index'])->name('student.monthly.fee.view');
	Route::get('/monthly/fee/getstudent',[StudentMonthlyFeeController::class,'getStudent'])->name('student.monthly.fee.getStudent');
	Route::get('/monthly/fee/pdf',[StudentMonthlyFeeController::class,'paySlip'])->name('student.monthly.fee.slip');

		// Exam fee controllers
	Route::get('/exam/fee',[ExamFeeController::class,'index'])->name('student.exam.fee.view');
	Route::get('/exam/fee/getstudent',[ExamFeeController::class,'getStudent'])->name('student.exam.fee.getStudent');
	Route::get('/exam/fee/pdf',[ExamFeeController::class,'paySlip'])->name('student.exam.fee.slip');
});	


