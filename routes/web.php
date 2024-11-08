<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\Check;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware(['auth', Check::class . ':admin,editor,creator,deleter']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('register', [LoginController::class, 'register']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/company', [CompanyController::class, 'index'])->name('company.index')->middleware(['auth', Check::class . ':admin,editor,creator,deleter']);
Route::get('/company-create', [CompanyController::class, 'create'])->name('company.create')->middleware(['auth', Check::class . ':admin,creator']);
Route::post('/company', [CompanyController::class, 'store'])->middleware(['auth', Check::class . ':admin,creator']);
Route::delete('/company/{id}', [CompanyController::class, 'delete'])->middleware(['auth', Check::class . ':admin,deleter']); 
Route::get('/company/{id}', [CompanyController::class, 'addProduct'])->middleware(['auth', Check::class . ':admin,editor,creator']);

Route::get('/product', [ProductController::class, 'product'])->name('product.index')->middleware(['auth', Check::class . ':admin,editor,creator,deleter']);
Route::get('/product-create', [ProductController::class, 'create'])->middleware(['auth', Check::class . ':admin,creator']); 
Route::post('/product', [ProductController::class, 'store'])->middleware(['auth', Check::class . ':admin,creator']);
Route::delete('/product/{id}', [ProductController::class, 'delete'])->middleware(['auth', Check::class . ':admin,deleter']); 
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update')->middleware(['auth', Check::class . ':admin,editor']);

Route::get('/client', [ClientController::class, 'client'])->name('client.index')->middleware(['auth', Check::class . ':admin,editor,creator,deleter']);
Route::get('/client-create', [ClientController::class, 'create'])->middleware(['auth', Check::class . ':admin,creator']);
Route::post('/client', [ClientController::class, 'store'])->middleware(['auth', Check::class . ':admin,creator']);
Route::delete('/client/{id}', [ClientController::class, 'delete'])->name('client.destroy')->middleware(['auth', Check::class . ':admin,deleter']);
Route::put('/client/{user}', [ClientController::class, 'update'])->name('client.update')->middleware(['auth', Check::class . ':admin,editor']);
