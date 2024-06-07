<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getSortJp(Request $request) {
        switch($request->sort) {
            case 'created_at':
                if ($request->order === 'desc') {
                    return '投稿日（新しい順）';
                } else {
                    return '投稿日（古い順）';
                }
            case 'likes':
                if ($request->order === 'desc') {
                    return 'いいね数（多い順）';
                } else {
                    return 'いいね数（少ない順）';
                }          
            default:
                return '投稿日（新しい順）';
        }
    }
}
