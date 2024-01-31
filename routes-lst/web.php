<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
// use App\Http\Controllers\PromptController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\PromptController;




Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared";
});
Route::get('/migration', function () {
    Artisan::call('migrate:fresh --seed');
    return "run successfully";
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

Route::get("/", [HomeController::class,"index"]);
// Route::get("/logout", [LoginController::class,"logout"])->name("logout");

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth','role:admin']], function () {
   

Route::get('/prompt-create', [PromptController::class, 'prompt_create'])->name('prompt.create');
Route::post('/prompt-create', [PromptController::class, 'prompt_store'])->name('prompt.store');
 Route::get('/users', [AdminController::class, 'index'])->name('users');
    Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::post('users/create/', [AdminController::class, 'store'])->name('users.store');

    // Edit User (Show Edit Form)
    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');

    // Update User (Handle Edit Form Submission)
    Route::put('/users/{id}', [AdminController::class, 'update'])->name('users.update');

    // Delete User
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');

Route::get('/https://cyberbulwark.com/upwork/',function () {
    return view('adminContent.Form2.newpage');
})->name('newpage');


// Route::get('/content', [AdminController::class,'show'])->name('content.show');
});
Route::group(['middleware' => ['auth', 'role:admin|user']], function () {
     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/content', [CrudController::class, 'index'])->name('content.show');
    Route::resource('/work', CrudController::class);

});


Route::group(['middleware' => ['auth','role:user']], function () {

    Route::get('/', [UserController::class, 'create'])->name('user.create');
    Route::POST('/store', [UserController::class, 'store'])->name('user.store');

});