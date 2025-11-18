@auth
    {{-- ユーザー一覧ページへのリンク --}}
    <li><a class="link link-hover" href="/users">Users</a></li>
    {{-- ユーザー詳細ページへのリンク --}}
    <li><a class="link link-hover" href="/users/{{ Auth::id() }}">{{ Auth::user()->name }}&#39;s profile</a></li>
    {{-- お気に入り投稿一覧タブ --}}
    <li><a class="link link-hover" href="{{ route('users.favorites', Auth::id()) }}" class="tab grow {{ Request::routeIs('users.favorites') ? 'tab-active' : '' }}">Favorites</a></li>
    <li><div class="divider lg:hidden"></div></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    {{-- ユーザー登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">Signup</a></li>
    <li><div class="divider lg:hidden"></div></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">Login</a></li>
@endauth

