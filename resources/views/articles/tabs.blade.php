<ul class="nav nav-tabs nav-justified mt-3">
  <li class="nav-item">
    <a class="nav-link text-muted {{ $everyone ? 'active' : '' }}"
      href="{{ route('articles.index') }}">
      全員
    </a>
  </li>
  @auth
  <li class="nav-item">
    <a class="nav-link text-muted {{ $following ? 'active' : '' }}"
      href="{{ route("articles.following", ["name" => Auth::user()->name]) }}">
      フォロー中
    </a>
  </li>
  @endauth
</ul>
