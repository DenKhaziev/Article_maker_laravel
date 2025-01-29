<?php

namespace App\Http\Controllers;

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
