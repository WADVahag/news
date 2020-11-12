@extends('layouts.main')

@section('content') 
<div class="col-lg-8">
    <h2 class="text-center mt-2">News</h2>
    <div class="news__container" style="position: relative">
        <div class="row justify-content-between p-4">
            @each('parts.news_card', $news, 'newsItem', 'No news found')
            {{-- @each('view.name', $collection, 'variable', 'No news found'); --}}
        </div>
    </div>    
</div>   

@endsection