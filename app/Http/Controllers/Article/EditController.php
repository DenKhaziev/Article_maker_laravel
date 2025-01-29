<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\Gate;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Article $article)
    {
//        Gate::authorize('update', function($article, $user) {
//            return $user->id === $article->user_id;
//        });
//        if(!Gate::allows('update', $article)) {
//            abort(403);
//        }
            return view('articles.edit', ['articlesInView' => $article]);
    }
}
