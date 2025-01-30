<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\UpdateRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $updateRequest, Article $article)
    {
        $data = $updateRequest->validated();
        if($article->image) {
            Storage::delete($article->image);
        }
        $article->updateImage($data);
        return redirect(route('index'));
    }
}
