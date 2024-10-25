<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AdminController::class, 'admin']);


Route::get('/company', [CompanyController::class, 'company']);
Route::get('/company-create', [CompanyController::class, 'create']);
Route::post('/company', [CompanyController::class, 'store']);
Route::delete('/company/{id}', [CompanyController::class, 'delete']);


Route::get('/product', [ProductController::class, 'product']);


Route::get('/client', [ClientController::class, 'client']);
Route::get('/client-create', [ClientController::class, 'create']);
Route::post('/client', [ClientController::class, 'store']);
Route::delete('client/{id}', [ClientController::class, 'delete']);