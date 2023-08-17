<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DropListController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\TaskController;
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
    return view('welcome');
});

Route::view('paer', 'cms.paernt');

Route::prefix('/ToDoList')->group(function () {
    Route::get('/showlogin', [AuthController::class, 'showLogin'])->name('cms.showlogin');
    Route::post('/login', [AuthController::class, 'Login'])->middleware('throttle:3,1')->name('cms.login');
});
Route::prefix('/ToDoList')->middleware('auth:web')->group(function () {
    Route::resource('/droplists', DropListController::class);
    Route::resource('/priorities', PriorityController::class);
    Route::resource('/tasks', TaskController::class);
    Route::post('/stor_user/{usertype}/', [DropListController::class, 'store'])->name('droplistis.stores');
    // Route::post('/stor', [DropListController::class, 'store'])->name('droplists.store');


    Route::get('/logout', [AuthController::class, 'logout'])->name('cms.logout');
});