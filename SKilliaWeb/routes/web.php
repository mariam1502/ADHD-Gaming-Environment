<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\AddPatientController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 Route::get('/dashboard', function () {
     return view('dashboard');
 })->name('dashboard');

 Route::get('/profile', function () {
     return view('profile');
 })->name('profile');

 Route::get('/patients', function () {
     return view('patients');
 })->name('patients');

 Route::get('/games', function () {
     return view('games');
 })->name('games');

//  Route::resource('therapist',TherapistController::class)->only([
//     'destory','show','store','update'
//  ]);


// Route::get('/your-url', [YourControllerName::class, 'index'])->name('your_index_route_name');
Route::get('/view', [TherapistController::class, 'create']);
Route::post('/store', [TherapistController::class, 'store']);
// Route::get('/edit/{id}', [TherapistController::class, 'edit'])->name('your_edit_route_name');
// Route::put('/your-url/update/{id}', [TherapistController::class, 'update'])->name('your_update_route_name');
Route::delete('/your-url/delete/{id}', [TherapistController::class, 'delete'])->name('your_delete_route_name');
Auth::routes();

Route::get('/add_patient', [AddPatientController::class, 'index']);
Route::post('/adding_patient', [AddPatientController::class, 'store']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
