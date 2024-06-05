<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RankingController extends Controller
{
    public function article() {
        $users = User::get()->sortByDesc('count_articles');
        return view('rankings.article', ['users' => $users, 'article' => true]);
    }

    public function follower() {
        $users = User::get()->sortByDesc('count_followers');
        return view('rankings.follower', ['users' => $users, 'follower' => true]);
    }

    public function like() {
        $users = User::get()->sortByDesc('count_get_likes');
        return view('rankings.like', ['users' => $users, 'like' => true]);
    }
}
