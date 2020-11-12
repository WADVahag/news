@extends('layouts.app')

@section('content') 

<div class="col-lg-12 col-md-12">
  <h3 class="mb-2 text-center">Dear {{ auth()->user()->name }}, welcome to admin panel!</h3>
</div>

<div class="col-lg-6 col-sm-12">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">News</h5>
      <p class="card-text">CRUD for news.</p>
    <a href="{{ route('admin.news.index') }}" class="btn btn-primary">Manage news</a>
    </div>
  </div>
</div> 

<div class="col-lg-6 col-sm-12">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Categories</h5>
      <p class="card-text">CRUD for categories.</p>
    <a href="{{ route('admin.categories.index')}}" class="btn btn-primary">Manage categories</a>
    </div>
  </div>
</div>   

@endsection