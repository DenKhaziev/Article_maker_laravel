<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class StoreCategoryAtArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Article $article)
    {

        $post = request()->validate([
            'category_id' => 'required|integer',
        ]);
//        $categoryId = Category::get()->where('category_name', $request->input('category'))->first()->id;
//        $categoryId = Article::first()->category; // корректно меняет айдишник только впервые - при каждой замене оставляет старый айди
//        $article->update(['category_name' => $request->input('category'), 'category_id' => $categoryId]);
        $article->update($post);

        return redirect(route('articles.show', $article->id));
    }
}
