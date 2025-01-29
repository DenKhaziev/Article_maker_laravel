<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Article $article)
    {
        $isAdmin = User::get()->pluck('role')->first() == User::ROLE_ADMIN;
        $article->update(['views' => ++$article->views]);
        return view('articles.show',['articlesInView' => $article, 'isAdmin' => $isAdmin]);
//        return view('articles.show_post',['articlesInView' => $article]);
    }
}
