<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
// use App\Http\Controllers\PromptController;
use App\Http\Controllers\PromptController;

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

Route::get('/', [CrudController::class,'index']);

Route::resource('/work', CrudController::class);

Route::get('/prompt-create', [PromptController::class, 'prompt_create'])->name('prompt.create');
Route::post('/prompt-create', [PromptController::class, 'prompt_store'])->name('prompt.store');

