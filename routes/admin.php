<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;


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
//
Route::middleware(['auth:sanctum'])->group(function(){

Route::get('/', function () {
    return view('admin.index');
})->name('dashboard');

Route::resource('groups', GroupController::class);
Route::get('/groups/{id}/admins', [AdminController::class, 'index'])->name('group-admins');
Route::post('/groups/{group_id}/admins', [AdminController::class, 'store'])->name('group-admins-store');
Route::put('/groups/{group_id}/admins/{admin_id}', [AdminController::class, 'update'])->name('group-admins-update');
Route::delete('/groups/{group_id}/admins/{admin_id}', [AdminController::class, 'destroy'])->name('group-admins-delete');
Route::get('/groups/{id}/sub-admins', [SubAdminController::class, 'index'])->name('group-sub-admins');
Route::post('/groups/{group_id}/sub-admins', [SubAdminController::class, 'store'])->name('group-sub-admins-store');
Route::put('/groups/{group_id}/sub-admins/{sub_admin_id}', [SubAdminController::class, 'update'])->name('group-sub-admins-update');
Route::delete('/groups/{group_id}/sub-admins/{sub_admin_id}', [SubAdminController::class, 'destroy'])->name('group-sub-admins-delete');
Route::get('/groups/{id}/students', [StudentController::class, 'index'])->name('group-students');
Route::post('/groups/{group_id}/students', [StudentController::class, 'store'])->name('group-students-store');
Route::put('/groups/{group_id}/students/{student_id}', [StudentController::class, 'update'])->name('group-students-update');
Route::delete('/groups/{group_id}/students/{student_id}', [StudentController::class, 'destroy'])->name('group-students-delete');
Route::get('/super-admins', [SuperAdminController::class, 'index'])->name('super-admins');
Route::post('/super-admins', [SuperAdminController::class, 'store'])->name('super-admins-store');
Route::put('/super-admins/{super_admin_id}', [SuperAdminController::class, 'update'])->name('super-admins-update');
Route::delete('/super-admins/{super_admin_id}', [SuperAdminController::class, 'destroy'])->name('super-admins-delete');
Route::resource('questions', QuestionController::class);


Route::resource('categories', CategoryController::class);



});


