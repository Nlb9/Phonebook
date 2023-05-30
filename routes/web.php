<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/insert', [ContactController::class, 'store'])->name('contact.insert');
Route::get('/contact/read', [ContactController::class, 'show'])->name('contact.read');
Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::patch('/contact/{id}/update', [ContactController::class, 'update'])->name('contact.update');
Route::get('/contact/{id}/remove', [ContactController::class, 'destroy'])->name('contact.remove');

Route::get('contact/{id}/number/create', [NumberController::class, 'create'])->name('number.create');
Route::post('contact/{id}/number/insert', [NumberController::class, 'store'])->name('number.insert');
Route::get('contact/{id}/number/read', [NumberController::class, 'show'])->name('number.read');
Route::get('/number/{id}/edit', [NumberController::class, 'edit'])->name('number.edit');
Route::patch('/number/{id}/update', [NumberController::class, 'update'])->name('number.update');
Route::get('/number/{id}/remove', [NumberController::class, 'destroy'])->name('number.remove');

Route::get('/type/create', [TypeController::class, 'create'])->name('type.create');
Route::post('/type/insert', [TypeController::class, 'store'])->name('type.insert');
Route::get('/type/read', [TypeController::class, 'show'])->name('type.read');
Route::get('/type/{id}/edit', [TypeController::class, 'edit'])->name('type.edit');
Route::patch('/type/{id}/update', [TypeController::class, 'update'])->name('type.update');
Route::get('/type/{id}/remove', [TypeController::class, 'destroy'])->name('type.remove');


require __DIR__.'/auth.php';
