<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
->name('admin.')
->prefix('/admin')
->group(function(){

    Route:: get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('project',ProjectController::class);
    Route::resource('type',TypeController::class);
    Route::resource('tech',TechnologyController::class);
});
    


require __DIR__.'/auth.php';
