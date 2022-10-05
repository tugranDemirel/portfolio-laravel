<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\WorkAndSchool\WorkAndSchoolController;
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
    return view('front.index');
});

Auth::routes();

Route::middleware(['auth'])->prefix('admin')->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('work-and-school')->group(function (){
        Route::get('/school', [WorkAndSchoolController::class, 'schoolIndex'])->name('admin.workandschool.school');
        Route::get('/work', [WorkAndSchoolController::class, 'workIndex'])->name('admin.workandschool.work');
        Route::get('/create', [WorkAndSchoolController::class, 'create'])->name('admin.workandschool.create');
        Route::post('/store', [WorkAndSchoolController::class, 'store'])->name('admin.workandschool.store');
        Route::get('/edit/{type}', [WorkAndSchoolController::class, 'edit'])->name('admin.workandschool.edit');
        Route::post('/update/{type}', [WorkAndSchoolController::class, 'update'])->name('admin.workandschool.update');
        Route::post('/delete/{type}', [WorkAndSchoolController::class, 'destroy'])->name('admin.workandschool.delete');
    });
});
