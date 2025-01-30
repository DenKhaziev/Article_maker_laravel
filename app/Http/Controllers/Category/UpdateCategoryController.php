<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $updateRequest, Category $category)
    {
        $data = $updateRequest->validated();
        $category->update($data);
        return redirect(route('categories.index'));
    }
}
