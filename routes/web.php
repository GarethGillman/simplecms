<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\PageController;

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/dashboard/pages/new', [PageController::class, 'form'])->name('pages.new');
    Route::post('/dashboard/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::get('/dashboard/pages/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
    Route::get('/dashboard/pages/delete/{id}', [PageController::class, 'delete'])->name('pages.delete');
    Route::post('/dashboard/pages/update/{id}', [PageController::class, 'update'])->name('pages.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/page/{slug}', [PageController::class, 'view'])->name('pages.view');

require __DIR__.'/auth.php';