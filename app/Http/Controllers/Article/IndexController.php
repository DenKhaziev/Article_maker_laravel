<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Services\ResourceService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('index', [
            'articlesInView' => (new ResourceService)->articlesFilter($request)[0],
            'isAdmin' => (new ResourceService)->isAdmin(),
            'isFiltered' => (new ResourceService)->articlesFilter($request)[1]
        ]);
    }

}

