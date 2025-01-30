<?php

namespace App\Http\Controllers\CategoryAtArticle;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class EditCategoryAtArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Article $article)
    {
        $categories = Category::all();
        return view('categories.editArticle', ['articlesInView' => $article, 'categories' => $categories]);
    }
}
