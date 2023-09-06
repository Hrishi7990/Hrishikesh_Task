<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/', [EmployeeController::class, 'index'])->name('index');
Route::get('/add-employee', [EmployeeController::class, 'addEmployee']);
Route::post('/post-employee', [EmployeeController::class,'postEmployee']);
Route::get('/edit-employee/{id}', [EmployeeController::class, 'editEmployee']);
Route::post('/postedit-employee/{id}', [EmployeeController::class,'postEditEmployee']);
Route::get('/change-status/{id}', [EmployeeController::class, 'changeStatus']);


Route::get('/clients-list', [ClientController::class, 'clientList']);
Route::get('/add-client', [ClientController::class, 'addClient']);
Route::post('/post-client', [ClientController::class,'postClient']);
Route::get('/edit-client/{id}', [ClientController::class, 'editClient']);
Route::post('/postedit-client/{id}', [ClientController::class,'postEditClient']);