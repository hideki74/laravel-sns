@foreach($users as $user)
  @if ($loop->iteration === 1)
    @include('rankings.card', ['color' => 'gold'])
  @elseif ($loop->iteration === 2) 
    @include('rankings.card', ['color' => 'silver'])
  @elseif ($loop->iteration === 3) 
    @include('rankings.card', ['color' => 'bronze'])
  @else
    @include('rankings.card')
  @endif
@endforeach