<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, StoreRequest $storeRequest)
    {
        $data = $storeRequest->validated();
        Article::createWithUserAndCategory($data);
        return redirect(route('index'));
    }
}
