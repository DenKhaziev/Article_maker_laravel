<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class ResourceService
{
    public $user;
    public $query;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->query = Article::query();
    }

    public function articlesFilter ( $request) {

        // Если нажата кнопка фильтрации и пользователь залогинен
        if ($request->has('filter') && $request->filter === 'my_posts' && $this->user) {
           $this->query->where('user_id', $this->user->id);
        }
        $articles = $this->query->paginate(10);
        $filteredArticles = $request->has('filter') && $request->filter === 'my_posts';
        return [$articles, $filteredArticles];
    }
    public function isAdmin() {
        $isAdmin = User::get()->pluck('role')->first() == User::ROLE_ADMIN;
        return $isAdmin;
    }
}
