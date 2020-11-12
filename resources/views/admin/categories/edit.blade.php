@extends('layouts.app')

@section('content')
    
  <div class="col-lg-12">
    <h3 class="my-4"><a href="{{ route("admin.categories.index") }}">Categories</a></h3>

    <form action="{{ route("admin.categories.update", ["category" => $category]) }}" method="POST">
      @method("PATCH")
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input id="name" type="text" value='{{ old("name", $category->name) }}' name='name' class="form-control" placeholder="Category Name..." />
        @error('name')
            <span class="text-danger mt-1">{{ $message }}</span>
        @enderror
      </div>

      <button class="btn btn-primary">
        Update
      </button>
    </form>
  </div>
@endsection