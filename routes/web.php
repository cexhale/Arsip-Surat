<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', fn()=>redirect()->route('archives.index'));

Route::resource('archives', ArchiveController::class);
// route untuk download
Route::get('archives/{archive}/download', [ArchiveController::class,'download'])->name('archives.download');

Route::resource('categories', CategoryController::class);

// About page statis
Route::view('about','about')->name('about');
