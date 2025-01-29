<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // 1st method
//        $post = request()->validate([
//            'article_name' => 'string',
//            'article_description' => 'string',
//            'userId' => 'integer'
//        ]);
//        Article::create($post);
//        2nd method
//        dd($request->input());

        $post = request()->validate([
            'article_name' => 'required|string',
            'article_description' => 'required|string',
        ]);
//        dd($post);

        Article::createWithUserAndCategory($post);
        return redirect(route('index', [
            'filter' => $request->has('filter') ? $request->filter : null
        ]));
    }
}
