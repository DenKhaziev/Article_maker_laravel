<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Articles extends Controller
{

    function index() {
        $authorizedUser = Auth::user()->name;
        $articles = Article::get()->where('userId', Auth::id());
        return view('index', ['articlesInView' => $articles, 'authorizedUser' => $authorizedUser]);
    }

//    function show($id) {
//        $articles = Article::get()->where('id', $id)->first()->toArray();
//        Article::get()->where('id', $id)->first()->update(['views' => ++$articles['views']]);
//        return view('show_post',['articlesinview' => $articles]);
//    }

    function show(Article $article) {
        $article->update(['views' => ++$article->views]);
        return view('articles.show_post',['articlesInView' => $article]);
    }

    function update(Article $article, Request $request) {
        $article->update([
            'article_name' => $request->input('article_name'),
            'article_description' => $request->input('article_description'),
        ]);
        return redirect(route('index'));
    }

    function create() {
        $authId = Auth::user()->id;
        return view('articles.create_post', ['authId' => $authId]);
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
        $imageName = 'logo';
        $imageExtension = '.png';
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
        Article::create([
            'article_name' => $request->input('article_name'),
            'article_description' => $request->input('article_description'),
            'userId' => Auth::id(),
        ]);
        return redirect(route('index'));
    }

}
