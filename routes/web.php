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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum'])->group(function(){
	
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
	Route::resource('/designations',DesignationsController::class);
	
});

