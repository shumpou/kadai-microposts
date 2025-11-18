@extends('layouts.app')

@section('content')

<!-- ここにページごとのコンテンツを書く -->
<div class="prose mb-6">
        <h2 class="prose-lg">{{ Auth::user()->name }}のid: {{ $micropost->id }} の投稿編集ページ</h2>
    </div>

    <div class="justify-center">
        <form method="POST" action="{{ route('microposts.update', $micropost->id) }}" class="w-1/2">
            @csrf
            @method('PUT')
                <div class="my-4 mb-5">
                    <label for="content" class="label">
                        <span class="label-text">投稿内容</span>
                    </label>
                    <textarea type="text" name="content" class="input input-bordered w-full h-[200px]">{{ $micropost->content }}</textarea>
                </div>

                {{-- 前のページに戻るボタン --}}
            <a class="btn btn-outline btn-outline mb-4" href="{{ url()->previous() }}">戻る</a>
            <button type="submit" class="btn btn-neutral btn-primary mb-4">更新</button>
        </form>
        {{-- 投稿削除フォーム --}}

    <form method="POST" action="{{ route('microposts.destroy', $micropost->id) }}" class="my-2">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-error btn-outline"
            onclick="return confirm('id = {{ $micropost->id }} の投稿を削除します。よろしいですか？')">この投稿を削除</button>
    </form>
</div>

@endsection