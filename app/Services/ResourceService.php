<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class ResourceService
{
//    public $user;
//    public $query;

//    public function __construct()
//    {
//        $this->user = Auth::user();
//        $this->query = Article::query();
//    }

    static function articlesFilter ( $request) {

        $user = Auth::user();
        $query = Article::query();

        // Если нажата кнопка фильтрации и пользователь залогинен
        if ($request->has('filter') && $request->filter === 'my_posts' && $user) {
           $query->where('user_id', $user->id);
        }
//        if ($request->filled('user_id')) {
//            $query->where('user_id', $request->user_id);
//        }
        $articles = response()->json($query->paginate(10));
        $filteredArticles = $request->has('filter') && $request->filter === 'my_posts';
        return [$articles, $filteredArticles];
    }
//    static function isAdmin() {
////        $isAdmin = User::get()->pluck('role')->first() == User::ROLE_ADMIN;
////        $isAdmin = User::getRoles()[2];
////        $isAdmin = User::class->isAdmin();
//
//        return $isAdmin;
//    }
}
