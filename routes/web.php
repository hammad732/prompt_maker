<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\PromptController;
use App\Http\Controllers\PromptController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

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
Auth::routes();

// Route::get("/login", [AdminController::class,"login"])->name("login");
Route::get("/", [AdminController::class,"logout"])->name("logout");

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/content', [CrudController::class,'index'])->name('content.show');
Route::resource('/work', CrudController::class);
Route::get('/prompt-create', [PromptController::class, 'prompt_create'])->name('prompt.create');
Route::post('/prompt-create', [PromptController::class, 'prompt_store'])->name('prompt.store');
// Route::get('/content', [AdminController::class,'show'])->name('content.show');
});