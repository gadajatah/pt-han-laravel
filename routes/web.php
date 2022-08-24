<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::prefix('employees')->group( function () {
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/create', [EmployeeController::class, 'store']);
    Route::get('/{id}/detail', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/{id}/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/{id}/delete', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});
Route::get('/export-employees', [ReportController::class, 'index'])->name('employees.export');
