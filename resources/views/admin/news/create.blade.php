@extends('layouts.app')

@section('content')
    
  <div class="col-lg-12">
    <h3 class="my-4"><a href="{{ route("admin.news.index") }}">News</a></h3>
    <form action="{{ route("admin.news.store") }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input id="title" type="text" name='title' value="{{ old('title') }}" class="form-control" placeholder="Post title..." />
        @error('title')
            <span class="text-danger mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
        @error('body')
            <span class="text-danger mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" accept="image/*" />
        @error('image')
            <span class="text-danger mt-1">{{ $message }}</span>
        @enderror
      </div>

       <div class="form-group">
        <label for="categories">Categories</label>
        <p>
          <em class="text-secondary">Use cntrl + click to select multiple categories.</em>
        </p>
        <select name="categories[]" multiple class="form-control">
          @forelse ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>  
          @empty
            No categories available
          @endforelse
        </select>
        @error('categories')
            <span class="text-danger mt-1">{{ $message }}</span>
        @enderror
      </div>

      <button class="btn btn-primary">
        Create
      </button>
    </form>
  </div>
@endsection