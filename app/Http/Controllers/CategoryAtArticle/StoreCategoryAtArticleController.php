<?php

namespace App\Http\Controllers\CategoryAtArticle;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryAtArticle\UpdateRequest;
use App\Models\Article;

class StoreCategoryAtArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $updateRequest, Article $article)
    {
        $data = $updateRequest->validated();
        $article->update($data);
        return redirect(route('articles.show', $article->id));
    }
}
