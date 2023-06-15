<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('welcome');
})->name('signin-view');
Route::post('signin', [AuthController::class, 'signin'])->name('signin');


/**
 * Protected Routes ...
 */
/**
 * Protected Routes ...
 */
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('app/signout', [AuthController::class, 'signout']);
    Route::get('app/tasks', [TaskController::class, 'index'])->name('home');
});
