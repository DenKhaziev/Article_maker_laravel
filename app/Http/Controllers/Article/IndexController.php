<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Получаем залогиненного пользователя
        $user = Auth::user();

        // Начинаем запрос для получения постов
        $query = Article::query();

        // Если нажата кнопка фильтрации и пользователь залогинен
        if ($request->has('filter') && $request->filter === 'my_posts' && $user) {
            // Фильтруем посты по ID пользователя
            $query->where('user_id', $user->id);
        }

        // Получаем отфильтрованные посты
        $articles = $query->paginate(10);
        $filteredArticles = $request->has('filter') && $request->filter === 'my_posts';

//        Gate::authorize('viewAny', Article::class); // оставлю для напоминалки - работа policy ограничивает доступ для CRUD
//        $authorizedUser = Auth::user()->name; // сделал хелпер во вьюхе
//        dd(123);
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
//        $articles = Article::get()->where('user_id', Auth::id());
        $authorizedUserArticles = Article::get()->where('user_id', auth()->user()->id);
        $isAdmin = User::get()->pluck('role')->first() == User::ROLE_ADMIN;
//        $isArticlesByAuthorizedUser // ?????? - done wich policy and @can
//        dd(User::ROLE_ADMIN, User::get()->pluck('role')->first());

//        return view('index', ['articlesInView' => $articles , 'categoryName' => Article::all()->first()->category->category_name]);
        return view('index', ['articlesInView' => $articles, 'isAdmin' => $isAdmin, 'isFiltered' => $filteredArticles]);
    }

}

