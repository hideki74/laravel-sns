<nav class="navbar navbar-expand navbar-dark blue-gradient">

  <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>memo</a>

  <ul class="navbar-nav ml-auto">
    @isset($sort_jp)
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-sort-amount-down"></i>{{ $sort_jp }}
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ url()->current() }}?sort=created_at&order=desc">投稿日（新しい順）</a>
          <a class="dropdown-item" href="{{ url()->current() }}?sort=created_at&order=asc">投稿日（古い順）</a>
          <a class="dropdown-item" href="{{ url()->current() }}?sort=likes&order=desc">いいね数（多い順）</a>
          <a class="dropdown-item" href="{{ url()->current() }}?sort=likes&order=asc">いいね数（少ない順）</a>
        </div>
      </div>
    @endisset
    
    
    <li class="nav-item">
      <a class="nav-link" href="/rankings/article"><i class='fas fa-award mr-1'></i>ランキング</a>
    </li>

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest

    @auth
    <li class="nav-item">
      <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
    </li>
    @endauth

    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>
    <!-- Dropdown -->
    @endauth

  </ul>

</nav>
