<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
        <i class="fas fa-user-circle fa-3x"></i>
      </a>
      @if( Auth::id() !== $user->id )
        <follow-button
        class="ml-auto"
        :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
        >
        </follow-button>  
      @else
        <div class="ml-auto"></div>
      @endif
    <div class="col-1 text-right display-4 {{ $color ?? '' }}">
      @isset($article)
      {{ $user->count_articles }}
      @endisset
      @isset($follower)
      {{ $user->count_followers }}
      @endisset
      @isset($like)
      {{ $user->count_get_likes }}
      @endisset
    </div>
    </div>
    <h2 class="h5 card-title m-0">
      <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">{{ $user->name }}</a>
    </h2>
  </div>
</div>