<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    /**
     * 投稿をお気に入り登録するアクション。
     *
     * @param  string  $id  対象の投稿ID
     * @return \Illuminate\Http\Response
     */
    public function store(string $id)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        // 認証ユーザーが投稿をお気に入りに追加
        $user->favorite(intval($id));

        // 前のページへ戻る
        return back();
    }

    /**
     * 投稿のお気に入りを解除するアクション。
     *
     * @param  string  $id  対象の投稿ID
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        // 認証ユーザーが投稿のお気に入りを解除
        $user->unfavorite(intval($id));

        // 前のページへ戻る
        return back();
    }
}
