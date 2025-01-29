<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class CreateImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Article $article)
    {
        return view('images.edit', ['articlesInView' => $article]);

    }
}
