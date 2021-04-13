<?php

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
Route::get('/', [App\Http\Controllers\frontend\DashboardController::class, 'index'])->name('index');
Route::get('/course', [App\Http\Controllers\frontend\DashboardController::class, 'courseShow'])->name('courseShow');
Route::get('/course/{id}', [App\Http\Controllers\frontend\DashboardController::class, 'courseDetails'])->name('course.view');
Route::resource('index', App\Http\Controllers\frontend\DashboardController::class);
Auth::routes();
// admin route
Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('dashboard',[App\Http\Controllers\admin\DashboardController::class,'index'])->name('dashboard');
    Route::resource('roles', App\Http\Controllers\admin\RoleController::class);
    Route::resource('users', App\Http\Controllers\admin\UserController::class)->except([
        'destroy'
    ]);
    Route::get('/users/{id}', [App\Http\Controllers\admin\UserController::class, 'destroy'])
        ->name('destroy');
    Route::resource('category', App\Http\Controllers\admin\CategoryController::class);
    Route::resource('courseEnroll', App\Http\Controllers\admin\CourseEnrollController::class);
});
// teacher route
Route::group(['as'=>'teacher.','prefix'=>'teacher','middleware'=>['auth','teacher']],function (){
    Route::get('dashboard',[App\Http\Controllers\Teacher\DashboardController::class,'index'])->name('dashboard');
    Route::resource('post', App\Http\Controllers\Teacher\PostController::class);

});
// user route
Route::group(['as'=>'user.','prefix'=>'user','middleware'=>['auth','user']],function (){
    Route::get('dashboard',[App\Http\Controllers\User\DashboardController::class,'index'])->name('dashboard');

});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');