<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewuserController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\ValidateUser;

Route::get('/welcome', function () {
    $c_name = ['Al', 'SD'];
    $semester = '6th';
    return view('welcome', compact('c_name', 'semester'));
});

Route::get('/home/{id}',[HomeController::class, 'show']);

Route::get('/index',[HomeController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::view('/add','addUser')->name('displayform');
Route::post('/addUser', [NewuserController::class, 'addUser'])->name('add.user');
Route::get('/newuser',[NewuserController::class, 'index'])->name('view.user')->middleware(ValidateUser::class);
Route::post('/update/{id}',[NewuserController::class, 'updateUser'])->name('update.user');
Route::get('/updatepage/{id}',[NewuserController::class, 'fetchData'])->name('fetchdata.user');
Route::get('/delete/{id}',[NewuserController::class, 'deleteUser'])->name('delete.user');
Route::post('/addusers', [NewuserController::class, 'addUser'])->name('add.user');
Route::get('/newuser/{id}',[NewuserController::class, 'getUser'])->name('user');
Route::get('/delete/{id}',[NewuserController::class, 'deleteUser'])->name('delete.user');
Route::post('/update/{id}',[NewuserController::class, 'updateUser'])->name('update.user');
Route::get('/updatepage/{id}',[NewuserController::class, 'fetchData'])->name('fetchdata.user');

Route::get('image-upload', [ NewuserController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ NewuserController::class, 'imageUploadPost' ])->name('image.upload.post');

Route::get('send-mail', [MailController::class, 'index']);