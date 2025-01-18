<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class Categories extends Controller
{
    function index () {
        $categories = Category::get();

//        dd($categories->articles);
        return view('categories.category_list', ['categoriesInView' => $categories]);
    }

    function create() {
        return view('categories.create_category');
    }

    // git status

    function change(Article $article) {
//        $articleId = Article::get()->where('id', $id)->first()->only('id'); // не передаю далее
        $categories = Category::get()->toArray();
        return view('categories.select_category', ['articlesInView' => $article, 'categories' => $categories]);
    }


//    function change_at_store($id, Request $request) {
////        $res = $request->input('category');
//        Article::get()->where('id', $id)->first()->update(['category_name' => $request->input('category')]);
//        return redirect(route('show', ['id' => $id]));
//    }
    function change_article_category(Article $article, Request $request) {

        $categoryId = Category::get()->where('category_name', $request->input('category'))->first()->id;
//        $categoryId = Article::first()->category; // корректно меняет айдишник только впервые - при каждой замене оставляет старый айди
//        $article->update(['category_name' => $request->input('category'), 'category_id' => $categoryId]);
        $article->update(['category_id' => $categoryId]);

        return redirect(route('articles_show', $article->id));
    }

    function add_category_store(Request $request) {
//        DB::table('categories')->insert(['category_name' => $request->input('category')]);
        Category::create(['category_name' => $request->input('category')]);
        return redirect(route('categories_index'));
    }

    function edit(Category $category) {
        return view('categories.edit_category', ['category' => $category]);
    }

    function destroy(Category $category) {
        $category->delete();
        return redirect(route('categories_index'));
    }

    function update(Category $category, Request $request) {
        $category->update(['category_name' => $request->input('category')]);
        return redirect(route('categories_index'));
    }

}
