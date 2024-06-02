<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;

use App\Http\Livewire\News\Index;
use App\Http\Livewire\News\Create;
use App\Http\Livewire\News\Show;
use App\Http\Livewire\News\Edit;
use App\Http\Livewire\News\Delete;

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

Route::get('/', Home::class)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/news', Index::class)->name('news.index');
    Route::get('/news/create', Create::class)->name('news.create'); // Mudança feita aqui
    Route::get('/news/{id}', Show::class)->name('news.show');
    Route::get('/news/{id}/edit', Edit::class)->name('news.edit');
    Route::delete('/news/{news}', Delete::class)->name('news.delete');
});

require __DIR__.'/auth.php';
