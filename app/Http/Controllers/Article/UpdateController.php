<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Article $article)
    {
        $newArticle = request()->validate([
            'article_name' => 'string',
            'article_description' => 'string'
        ]);
        $article->update($newArticle);
        return redirect(route('index'));
    }
}
