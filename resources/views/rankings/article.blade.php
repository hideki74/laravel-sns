@extends('app')
@section('title', '記事数ランキング')
@include('nav')
@section('content')
  <div class="container">
    @include('rankings.tabs', ['article' => true])
  </div>
@endsection