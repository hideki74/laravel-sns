@extends('app')
@section('title', 'いいね数ランキング')
@include('nav')
@section('content')
  <div class="container">
    @include('rankings.tabs', ['like' => true] )
  </div>
@endsection