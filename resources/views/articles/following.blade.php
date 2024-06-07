@extends('app')

@section('title', '記事一覧')
@include('nav')

@section('content')
  <div class="container">
    @include('articles.tabs', ['everyone' => false, 'following' => true])
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection