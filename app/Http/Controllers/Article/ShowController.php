<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Services\ResourceService;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Article $article)
    {
        $article->update(['views' => ++$article->views]);
        return view('articles.show',[
            'articlesInView' => $article,
//            'isAdmin' => (new ResourceService)->isAdmin()
        ]);
    }
}
