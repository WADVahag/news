@extends('layouts.main')

@section('content') 
<div class="col-lg-8 news__container">
    <div class="card my-3">
        <img src="{{ asset('/images/newstest.jpg') }}" class="card-img-top" alt="{{ $news->title }}">
        <div class="card-body">
            <h4 class="card-title">{{ $news->title }}</h4>
            <p class="card-text mt-1">{{ $news->body }}</p>
        </div>
    </div>
</div>       

@endsection