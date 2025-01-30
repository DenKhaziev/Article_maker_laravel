<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke( Request $request, StoreRequest $storeRequest )
    {
        $data = $storeRequest->validated();
        Category::create($data);
        return redirect(route('categories.index'));
    }
}
