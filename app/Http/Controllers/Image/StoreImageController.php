<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Article $article)
    {
        // 1st method
//        $img = $request->file('image')->store();

        //2nd method
        if($article->image) {
            Storage::delete($article->image);
        }
        $img = Storage::disk('local')->put('images', $request->file('image'));  // не видит ярлык storage в папке public, если передавать в disk name public
        $article->update(['image' => $img]);
        return redirect(route('index'));
    }
}
