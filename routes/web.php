<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReportController;

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

Route::get('/', function () {
    return view('welcome');
});

/*Home*/
Route::get('home', [AuthController::class, 'home'])->name('home');

/*Authentication*/
Route::get('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

/*Landing Page*/
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

/*Sales*/
Route::get('sales/viewAll', [SaleController::class, 'viewAll'])->name('sales.viewAll');
Route::get('sales/create', [SaleController::class, 'createForm'])->name('sales.create');
Route::post('sales/storeCreate', [SaleController::class, 'storeCreate'])->name('sales.storeCreate');
Route::get('sales/update/{id}', [SaleController::class, 'updateForm'])->name('sales.update');
Route::post('sales/storeUpdate/{id}', [SaleController::class,'storeUpdate'])->name('sales.storeUpdate');
Route::get('sales/delete/{id}', [SaleController::class, 'delete'])->name('sales.delete');
Route::get('sales/filter', [SaleController::class, 'filter'])->name('sales.filter');
Route::get('sales/nofilter', [SaleController::class, 'clearFilter'])->name('sales.clearFilter');
Route::get('sales/downloadPDF/all', [SaleController::class, 'generatePDF'])->name('sales.pdf');

/*Expenses*/
Route::get('expenses/viewAll', [ExpenseController::class, 'viewAll'])->name('expenses.viewAll');
Route::get('expenses/create', [ExpenseController::class, 'createForm'])->name('expenses.create');
Route::post('expenses/storeCreate', [ExpenseController::class, 'storeCreate'])->name('expenses.storeCreate');
Route::get('expenses/update/{id}', [ExpenseController::class, 'updateForm'])->name('expenses.update');
Route::post('expenses/storeUpdate/{id}', [ExpenseController::class,'storeUpdate'])->name('expenses.storeUpdate');
Route::get('expenses/delete/{id}', [ExpenseController::class, 'delete'])->name('expenses.delete');
Route::get('expenses/filter', [ExpenseController::class, 'filter'])->name('expenses.filter');
Route::get('expenses/nofilter', [ExpenseController::class, 'clearFilter'])->name('expenses.clearFilter');
Route::get('expenses/downloadPDF/all', [ExpenseController::class, 'generatePDF'])->name('expenses.pdf');

/*Report*/
Route::get('reports/viewAll', [ReportController::class, 'viewAll'])->name('reports.viewAll');
Route::get('reports/filter', [ReportController::class, 'filter'])->name('reports.filter');
Route::get('reports/nofilter', [ReportController::class, 'clearFilter'])->name('reports.clearFilter');
Route::get('reports/downloadPDF/all', [ReportController::class, 'generatePDF'])->name('reports.pdf');