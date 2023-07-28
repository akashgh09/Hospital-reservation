<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


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

Route::get('/', [ProjectController::class, 'getAllDepartments'])->name('home');
Route::post('/showAppoinments', [ProjectController::class, 'showAppoinments'])->name('showAppoinments')->middleware('auth') ;
Route::post('/bookAppoinment',[ProjectController::class,'bookAppoinment'])->name('bookAppoinment')->middleware('auth');
Route::get('/myBooking',[ProjectController::class,'myBooking'])->name('myBooking')->middleware('auth');
Route::post('/cancelAppoinment',[ProjectController::class,'cancelAppoinment'])->name('cancelAppoinment')->middleware('auth');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

