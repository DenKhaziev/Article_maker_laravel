<?php

use App\Http\Controllers\Articles;
use App\Http\Controllers\Categories;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Articles::class, 'index'])->name('index');
Route::get('/articles/{article}', [Articles::class, 'show'])->name('articles_show');
Route::get('/create/articles', [Articles::class, 'create'])->name('articles_create');
Route::get('/categories', [Categories::class, 'index'])->name('categories_index');
Route::get('/categories/create', [Categories::class, 'create'])->name('categories_create');
Route::get('/articles/{article}/edit', [Articles::class, 'edit'])->name('articles_edit');
Route::get('/categories/update/{article}', [Categories::class, 'change'])->name('articles_change_category');
Route::get('/articles/update/{article}', [Articles::class, 'change_status'])->name('articles_change_status');
Route::get('/articles/image/{article}', [Articles::class, 'upload_image'])->name('upload_image');
Route::post('/store/image/{article}', [Articles::class, 'upload_store'])->name('upload_image_to_store');
Route::post('/store/categories/{article}', [Categories::class, 'change_article_category'])->name('categories_change_category');
Route::post('/store/categories', [Categories::class, 'add_category_store'])->name('categories_add_category');
Route::delete('/articles/destroy/{article}', [Articles::class, 'destroy'])->name('articles_destroy');
Route::post('/store/article', [Articles::class, 'add_article'])->name('add_article_to_store');
Route::patch('/articles/article/update/{article}', [Articles::class, 'update'])->name('articles_update');
Route::delete('/categories/destroy/{category}', [Categories::class, 'destroy'])->name('categories_destroy');
Route::get('/categories/{category}/edit', [Categories::class, 'edit'])->name('categories_edit');
Route::patch('/categories/update/{category}', [Categories::class, 'update'])->name('categories_update');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
