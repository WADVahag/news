@extends('layouts.app')

@section('content')
    
  <div class="col-lg-12">
    <h3 class="my-4"><a href="{{ route("admin.news.index") }}">News</a></h3>
    <form action="{{ route("admin.news.update", ["news" => $news]) }}" method="POST" enctype="multipart/form-data">
      @method("PATCH")
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input id="title" type="text" name='title' value="{{ old('title', $news->title) }}" class="form-control" placeholder="Post title..." />
        @error('title')
            <span class="text-danger mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" class="form-control">{{ old('body', $news->body) }}</textarea>
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

        <div style="width: 18rem" class="mt-4">
          <img src="{{ $news->image_url }}" alt="{{ $news->title }}" class="img-responsive">
        </div>
      </div>

       <div class="form-group">
        <label for="categories">Categories</label>
        <p>
          <em class="text-secondary">Use cntrl + click to select multiple categories.</em>
        </p>
        <select name="categories[]" multiple class="form-control">
          @forelse ($categories as $category)
            <option 
            @if (in_array($category->id, old("categories", $category_ids)))
              selected
            @endif
            value="{{ $category->id }}">{{ $category->name }}</option>  
          @empty
            No categories available
          @endforelse
        </select>
        @error('categories')
            <span class="text-danger mt-1">{{ $message }}</span>
        @enderror
      </div>

      <button class="btn btn-primary">
        Update
      </button>
    </form>
  </div>
@endsection