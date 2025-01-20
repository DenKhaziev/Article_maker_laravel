<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class Articles extends Controller
{

    function index() {
//        $authorizedUser = Auth::user()->name; // сделал хелпер во вьюхе

//        $articles = Cache::get('articles');
//        if (!$articles) {
//            $articles = Article::query()
//                ->select(['id', 'article_name', 'userId', 'category_id'])
//                ->limit(6)
//                ->orderBy('id', 'DESC')
////                ->with('user')
//                ->with('category')
//                ->get();
//            Cache::add('article', $articles);
//        }
        $articles = Article::get()->where('user_id', Auth::id());
//        return view('index', ['articlesInView' => $articles , 'categoryName' => Article::all()->first()->category->category_name]);
        return view('index', ['articlesInView' => $articles]);

    }

//    function show($id) {
//        $articles = Article::get()->where('id', $id)->first()->toArray();
//        Article::get()->where('id', $id)->first()->update(['views' => ++$articles['views']]);
//        return view('show_post',['articlesinview' => $articles]);
//    }

    function show(Article $article) {
        $article->update(['views' => ++$article->views]);
        return view('articles.show_post',['articlesInView' => $article, 'categoryName' => $article->category->category_name]);
//        return view('articles.show_post',['articlesInView' => $article]);

    }

    function update(Article $article, Request $request) {
        $newArticle = request()->validate([
            'article_name' => 'string',
            'article_description' => 'string'
        ]);
        $article->update($newArticle);
        return redirect(route('index'));
    }

    function create() {
//        $authId = Auth::user()->id;
//        SOME CODE
        return view('articles.create_post');
    }

//    function edit($id) {
//        $articles = Article::get()->where('id', $id)->first()->toArray();
//        return view('edit_post', ['articlesinview' => $articles]);
//    }

    function edit(Article $article) {
        return view('articles.edit_post', ['articlesInView' => $article]);
    }

//    function change_status($id) {
//        $status = Article::get()->where('id', $id)->pluck('status')->first();
//        Article::get()->where('id', $id)->first()->update(['status' => !$status]);
//        return redirect(route('show', ['id' => $id]));
//    }

    function change_status(Article $article) {
        $status = $article->status;
        $article->update(['status' => !$status]);
        return redirect(route('articles_show', $article->id));
    }

    function upload_image(Article $article) {
//        $articles = Article::get()->where('id', $article->id)->first()->toArray();
        return view('articles.add_image_to_post', ['articlesInView' => $article]);
    }

    function upload_store(Article $article, Request $request) {
        $uploadImage = $request->image->store('uploads');
        $article->update(['image' => $uploadImage]);
        return redirect(route('index'));
    }

    function destroy(Article $article) {
//        Article::destroy($article->id);
        $article->delete();
        return redirect(route('index'));
    }

    function add_article(Request $request) {
        // 1st method
//        $post = request()->validate([
//            'article_name' => 'string',
//            'article_description' => 'string',
//            'userId' => 'integer'
//        ]);
//        Article::create($post);
//        2nd method
//        dd($request->input());

        $post = request()->validate([
            'article_name' => 'required|string',
            'article_description' => 'required|string',
        ]);
//        dd($post);

        Article::createWithUserAndCategory($post);
        return redirect(route('index'));
    }

}
