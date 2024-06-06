@extends('app')
@section('title', 'いいね獲得数ランキング')
@include('nav')
@section('content')
  <div class="container">
    @include('rankings.tabs')
    @include('rankings.users')
  </div>
@endsection