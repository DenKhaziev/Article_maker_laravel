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
            return view('articles.edit', ['articlesInView' => $article]);
    }
}
