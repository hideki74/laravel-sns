@extends('app')
@section('title', 'フォロワー数ランキング')
@include('nav')
@section('content')
  <div class="container">
    @include('rankings.tabs', ['follower' => true])
  </div>
@endsection