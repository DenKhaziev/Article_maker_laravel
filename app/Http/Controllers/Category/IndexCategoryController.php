<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Services\ResourceService;
use Illuminate\Http\Request;

class IndexCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $categories = Category::get();
        return view('categories.index', [
            'categoriesInView' => $categories,
//            'isAdmin' => ResourceService::isAdmin(),
        ]);
    }
}
