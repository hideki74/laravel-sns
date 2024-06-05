<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function article(){
        return view('rankings.article');
    }
    public function follower(){
        return view('rankings.follower');
    }
    public function like(){
        return view('rankings.like');
    }
}
