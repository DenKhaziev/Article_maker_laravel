<?php

use App\Http\Controllers\Article\ChangeStatusAtArticleController;
use App\Http\Controllers\Article\CreateController;
use App\Http\Controllers\Article\DestroyController;
use App\Http\Controllers\Article\EditController;
use App\Http\Controllers\Article\IndexController;
use App\Http\Controllers\Article\ShowController;
use App\Http\Controllers\Article\StoreController;
use App\Http\Controllers\Article\UpdateController;
use App\Http\Controllers\Category\CreateCategoryController;
use App\Http\Controllers\Category\DestroyCategoryController;
use App\Http\Controllers\Category\EditCategoryController;
use App\Http\Controllers\Category\IndexCategoryController;
use App\Http\Controllers\Category\StoreCategoryController;
use App\Http\Controllers\Category\UpdateCategoryController;
use App\Http\Controllers\CategoryAtArticle\EditCategoryAtArticleController;
use App\Http\Controllers\CategoryAtArticle\StoreCategoryAtArticleController;
use App\Http\Controllers\Image\CreateImageController;
use App\Http\Controllers\Image\StoreImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
        //articles
        Route::get('/', IndexController::class)->name('index');
        Route::get('/articles/{article}', ShowController::class)->name('articles.show');
        Route::get('/create/articles', CreateController::class)->name('articles.create');
        Route::get('/articles/{article}/edit', EditController::class)->name('articles.edit');
        Route::post('/articles', StoreController::class)->name('articles.store');
        //route update не видит путь без приставки update в конце пути, не знаю почему!
        Route::patch('/articles/{article}/update', UpdateController::class)->name('articles.update');
        Route::delete('/articles/{article}', DestroyController::class)->name('articles.destroy');

        //categories
        Route::get('/categories', IndexCategoryController::class)->name('categories.index');
        Route::get('/categories/create', CreateCategoryController::class)->name('categories.create');
        Route::get('/categories/{category}/edit', EditCategoryController::class)->name('categories.edit');
        Route::post('/categories', StoreCategoryController::class)->name('categories.store');
        Route::patch('/categories/{category}', UpdateCategoryController::class)->name('categories.update');
        Route::delete('/categories/{category}', DestroyCategoryController::class)->name('categories.destroy');

        //images
        Route::get('/images/{article}/create', CreateImageController::class)->name('images.create');
        Route::post('/images/{article}', StoreImageController::class)->name('images.store');

        //articles category & status
        Route::get('/categories/article/{article}/edit', EditCategoryAtArticleController::class)->name('articles.category.edit');
        Route::patch('/articles/{article}', StoreCategoryAtArticleController::class)->name('articles.category.store');
        Route::get('/articles/status/{article}', ChangeStatusAtArticleController::class)->name('articles.status.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
