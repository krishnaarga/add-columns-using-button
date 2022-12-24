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
Route::post('add-student', [StudentController::class, 'store']);
Route::post('update-student', [StudentController::class, 'update']);
Route::get('edit/{id}', [StudentController::class, 'edit']);
Route::get('delete/{id}', [StudentController::class, 'destroy']);

Route::get('get-session', function(){
    $session = session()->all();
    echo "<pre>";
    print_r($session);
});

Route::get('set-session', function(Request $request){
    $session = session()->all();
    // $last_session_id = session()->all()['last_session_id'] ?? $request->session()->put('last_session_id', 1);

    // $session_database = $session['database'];
    // $data = ['name'=>'Krishna', 'email'=>'krishnak@chetu.com', 'age'=>28];
    // array_push($session_database, $data);
    // $session = $request->session()->put('database', $session_database);
    
    // unset($session['user_name']);
    // session()->forget('last_session_id');
    
    // return $session;
});


Route::get('columns', [AddcolumnController::class, 'columns']);
Route::post('add-columns', [AddcolumnController::class, 'AddColumns']);