<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AddcolumnController;

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


Route::get('students', [StudentController::class, 'index']);
Route::get('add-student', [StudentController::class, 'store']);


Route::get('columns', [AddcolumnController::class, 'columns']);
Route::post('add-columns', [AddcolumnController::class, 'AddColumns']);