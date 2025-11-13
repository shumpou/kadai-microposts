@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favorited($user->id))
        {{-- お気に入り解除ボタン --}}
        <form method="POST" action="{{ route('favorites.unfavorite', $user->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="btn btn-error btn-soft btn-block normal-case"
                onclick="return confirm('id = {{ $user->id }} のお気に入りを解除します。よろしいですか？')">
                Unfavorite
            </button>
        </form>
    @else
        {{-- お気に入り登録ボタン --}}
        <form method="POST" action="{{ route('favorites.favorite', $user->id) }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-soft btn-block normal-case">
                Favorite
            </button>
        </form>
    @endif
@endif
