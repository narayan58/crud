<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

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

Route::get('/test', function () {
    return view('test-page');
});

 
/*Route::get('/hari', 'CompanyController@hariFunction')->name('hariRoute');
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('companies', CompanyController::class);
Route::resource('students', StudentController::class);
Route::get('student/attendance/{slug}', 'App\Http\Controllers\StudentController@attendanceDetail')->name('student.attendanceDetail');

Route::resource('news', NewsController::class);
//attendance
Route::post('attendance/post', 'App\Http\Controllers\AttendanceController@attendancePost')->name('attendance.post');

Route::get('attendance', 'App\Http\Controllers\AttendanceController@index')->name('attendance.index');
Route::get('attendance/list', 'App\Http\Controllers\AttendanceController@list')->name('attendance.list');

Route::post('attendance/final/post', 'App\Http\Controllers\AttendanceController@attendanceFinalPost')->name('attendanceFinalPost');
