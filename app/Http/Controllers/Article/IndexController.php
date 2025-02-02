<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Services\ResourceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $categories = Category::all();
        $user = Auth::user();
        $articleQuery = Article::query();

        if ($request->filled('user_id')) {
            $articleQuery->where('user_id', $request->user_id);
        }
        if ($request->filled('category_id')) {
            $articleQuery->where('category_id', $request->category_id);
        }
        if ($request->filled('my_articles')) {
            $articleQuery->where('user_id', $user->id);
        }

        return view('index', [
            'articlesInView' => $articleQuery->paginate(10),
//            'isAdmin' => ResourceService::isAdmin(),
            'categories' => $categories,
        ]);
    }

}

