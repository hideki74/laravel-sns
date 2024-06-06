<ul class="nav nav-tabs nav-justified mt-3">
  <li class="nav-item">
    <a class="nav-link text-muted {{ isset($article) ? 'active' : '' }}"
      href="{{ route('rankings.article') }}">
      記事数
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-muted {{ isset($follower) ? 'active' : '' }}"
      href="{{ route("rankings.follower") }}">
      フォロワー数
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-muted {{ isset($like) ? 'active' : '' }}"
      href="{{ route("rankings.like") }}">
      いいね獲得数
    </a>
  </li>
</ul>