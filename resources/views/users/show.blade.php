@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザー情報 --}}
            @include('users.card')
        </aside>
        <div class="sm:col-span-2 mt-4">
            {{-- タブ --}}
            @include('users.navtabs')
            {{-- 投稿フォーム --}}
            @include('microposts.form')
            {{-- 投稿一覧 --}}
            @include('microposts.microposts')
        </div>
    </div>
        @auth
            @if (Auth::id() === $user->id)
                <form action="{{ route('user.destroy') }}" method="POST"
                    onsubmit="return confirm('本当に退会しますか？')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-error mt-4">退会する</button>
                </form>
            @endif
        @endauth

@endsection