@extends('layouts.main')

@section('content') 

<div class="col-lg-8">
  <h3 class="text-center mt-2">{{$category->name}}</h3>
  <div class="news__container">
    <div class="row justify-content-between p-4">
        @each('parts.news_card', $news, 'newsItem', 'No news found')
    </div>
  </div>
</div>       

@endsection