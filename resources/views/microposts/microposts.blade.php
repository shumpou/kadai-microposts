<div class="mt-4">
    @if (isset($microposts))
        <ul class="list-none">
            @foreach ($microposts as $micropost)
                <li class="flex items-start gap-x-2 mb-4">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    <div class="avatar">
                        <div class="w-12 rounded">
                            <img src="{{ Gravatar::get($micropost->user->email) }}" alt="" />
                        </div>
                    </div>
                    <div>
                        <div>
                            {{-- 投稿の所有者のユーザー詳細ページへのリンク --}}
                            <a class="link link-hover text-info" href="{{ route('users.show', $micropost->user->id) }}">{{ $micropost->user->name }}</a>
                            <span class="text-muted text-gray-500">posted at {{ $micropost->created_at }}</span>
                        </div>
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                        </div>
                            {{-- 投稿編集 --}}
                        <div class="mt-2">
                            @if (Auth::id() === $micropost->user_id)
                                <a class="link link-hover text-info" href="{{ route('microposts.edit', $micropost->id) }}">
                                    この投稿を編集する
                                </a>
                            @endif
                        </div>

                        <div class="flex">
　                      <div class="w-fit mr-1">
                        {{-- お気に入り登録／お気に入り解除ボタン --}}
                        <div class="mt-2">
                            @if (Auth::user()->is_favorited($micropost->id))
                                {{-- お気に入り解除ボタン --}}
                                <form method="POST" action="{{ route('favorites.unfavorite', $micropost->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-error btn-soft btn-xs normal-case"
                                        onclick="return confirm('id = {{ $micropost->id }} のお気に入りを解除します。よろしいですか？')">
                                        Unfavorite
                                    </button>
                                </form>
                            @else
                                {{-- お気に入り登録ボタン --}}
                                <form method="POST" action="{{ route('favorites.favorite', $micropost->id) }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-primary btn-soft btn-xs normal-case">
                                        Favorite
                                    </button>
                                </form>
                            @endif
                        </div>
                        </div>
                        {{-- 投稿削除ボタン（自分の投稿のみ） --}}
                        @if (Auth::id() == $micropost->user_id)
                            <div class="mt-2">
                                <form method="POST" action="{{ route('microposts.destroy', $micropost->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-soft btn-error btn-xs normal-case"
                                        onclick="return confirm('Delete id = {{ $micropost->id }} ?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $microposts->links() }}
    @endif
</div>
