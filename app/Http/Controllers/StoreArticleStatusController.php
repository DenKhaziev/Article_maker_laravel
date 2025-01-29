<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class StoreArticleStatusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Article $article)
    {
        $status = $article->status;
        $article->update(['status' => !$status]);
        return redirect(route('articles.show', $article->id));
    }
}
