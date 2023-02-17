<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\userController;
use App\Http\Controllers\welcomePageController;
use App\Models\drug;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Catch_;

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

Route::get('/', [welcomePageController::class , "index"])->name("home");



Route::middleware("isUserLogin")->group(function(){
    Route::get('/createOrder/{id}', [welcomePageController::class , "create"])->name("user.create.order");
    Route::post('/createOrder', [welcomePageController::class , "store"])->name("user.store.order");
}) ; 

Route::middleware("isAdminLogin")->group(function(){

    Route::prefix('admin')->group(function(){
        Route::put("/drugs/archive/{id}/restore" , [DrugController::class , "restore_archive"])->name("drugs.archive.restore") ;
        Route::delete("/drugs/archive/{id}" , [DrugController::class , "destroy_archive"])->name("drugs.archive.destroy") ;
        Route::get("/drugs/archive" , [DrugController::class , "archive"])->name("drugs.archive") ;
        Route::resource('users', userController::class);
        Route::resource('drugs', DrugController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('orders', OrderController::class); 
    }) ;
}) ; 


Route::middleware("loginRegister")->group(function(){
    Route::get('/register',[authController::class,"register"])->name('register');
    Route::post('/register',[authController::class,"handleRegister"])->name('handleRegister');
    
    Route::get('/login',[authController::class,"login"])->name('login');
    Route::post('/login',[authController::class,"handleLogin"])->name('handleLogin');
}) ; 


Route::get('/logout',[authController::class,"logout"])->name('logout');






