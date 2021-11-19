<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\ServicesPagesController;
use App\Http\Controllers\PortfolioPagesController;
use App\Http\Controllers\AboutPagesController;
use App\Http\Controllers\ContactFormController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::prefix('admin')->group(function(){
});


Route::get('/',[PagesController::class,'index']);
//Route::get('/','PagesController@index')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//add admin//link name in website
Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin/dashboard',[MainPagesController::class,'dashboard']);
    //Route::get('/admin/dashboard','PagesController@dashboard')->name('admin.dashboard');
    
    //main
    Route::get('/admin/main',[MainPagesController::class,'index']);
    Route::put('admin-main-update',[MainPagesController::class,'update']);
    
    //servises
    Route::get('admin/services/create',[ServicesPagesController::class,'create']);
    Route::post('admin-services-store',[ServicesPagesController::class,'store']);
    Route::get('admin/services/list',[ServicesPagesController::class,'list']);
    Route::get('admin-services-edit/{id}',[ServicesPagesController::class,'edit']);
    Route::post('admin-services-update/{id}',[ServicesPagesController::class,'update']);
    Route::delete('admin-services-delete/{id}',[ServicesPagesController::class,'delete']);
    
    //portfolio
    Route::get('admin/portfolio/create',[PortfolioPagesController::class,'create']);
    //::put('admin-portfolio-store',[PortfolioPagesController::class,'store']);//image put
    //or
    Route::put('/admin/portfolio/store', [PortfolioPagesController::class, 'store'])->name('admin.portfolio.store');
    Route::get('admin/portfolio/list',[PortfolioPagesController::class,'list']);
    Route::get('admin-portfolio-edit/{id}',[PortfolioPagesController::class,'edit']);
    Route::post('admin-portfolio-update/{id}',[PortfolioPagesController::class,'update']);
    Route::delete('admin-portfolio-delete/{id}',[PortfolioPagesController::class,'destroy']);
    
    //about
    Route::get('admin/about/create',[AboutPagesController::class,'create']);
    Route::put('admin-about-store',[AboutPagesController::class,'store']);//image put
    Route::get('admin/about/list',[AboutPagesController::class,'list']);
    Route::get('admin-about-edit/{id}',[AboutPagesController::class,'edit']);
    Route::post('admin-about-update/{id}',[AboutPagesController::class,'update']);
    Route::delete('admin-about-delete/{id}',[AboutPagesController::class,'destroy']);
    
    //contact
    //Route::post('contact-store',[ContactFormController::class,'store']);
    //Route::post('/contact','ContactFormController@store')->name('contact.store');
    Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');
    
});

