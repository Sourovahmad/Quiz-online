<?php

use Illuminate\Support\Facades\Auth;
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




Route::get('/', function () {
    return view('index');
})->name('home');




Route::get('/questions', function () {
    return view('pages/questions');
})->name('questions');




Route::get('/about', function () {
    return view('pages/aboutus');
})->name('about');


Route::get('/contact', function () {
    return view('pages/contactus');
})->name('contact');




Route::get('/new-login', function () {
    return view('pages/auth/login');
});

Route::get('/new-otp', function () {
    return view('pages/auth/otp');
});

Route::get('/new-registar', function () {
    return view('pages/auth/registar');
});



Route::middleware(['auth:sanctum'])->get('/auth-redirecter', function () {

    if(Auth::user()->role_id == 4){
        return redirect(route('home'));
    }
    elseif(Auth::user()->role_id == 3 || Auth::user()->role_id == 2 || Auth::user()->role_id == 1){
        return redirect(route('admin.dashboard'));
    }
})->name('auth-redirecter');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
