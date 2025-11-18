@extends('layouts.app')

@section('content')

<!-- ここにページごとのコンテンツを書く -->
<div class="prose ml-4">
        <h2 class="prose-lg">{{ Auth::user()->name }}のid: {{ $micropost->id }} の投稿詳細ページ</h2>
    </div>

    <table class="table w-full my-4 mb-5">
        <tr>
            <th>id</th>
            <td>{{ $micropost->id }}</td>
        </tr>
        <tr>
            <th>投稿</th>
            <td>{{ $micropost->content }}</td>
        </tr>
    </table>
    {{-- 前のページに戻るボタン --}}
    <a class="btn btn-outline btn-outline mb-4" href="{{ url()->previous() }}">戻る</a>
    {{-- 投稿編集ページへのリンク --}}
    <a class="btn btn-neutral btn-primary mb-4" href="{{ route('microposts.edit', $micropost->id) }}">この投稿を編集</a>

    {{-- 投稿削除フォーム --}}

    <form method="POST" action="{{ route('microposts.destroy', $micropost->id) }}" class="my-2">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-error btn-outline"
            onclick="return confirm('id = {{ $micropost->id }} の投稿を削除します。よろしいですか？')">この投稿を削除</button>
    </form>
@endsection