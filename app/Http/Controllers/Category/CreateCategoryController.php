<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CreateCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('categories.create');

    }
}
