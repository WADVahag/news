@extends('layouts.app')

@section('content')
    
  <div class="col-lg-12 d-flex justify-content-between mb-2">
    <h3>News</h3>
    <a href="{{ route("admin.news.create") }}" class="btn btn-primary">+ news</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($news as $newsItem)
        <tr>
          {{-- project is too simple to encrypt ids  --}}
          <th scope="row">{{ $newsItem->id }}</th>
          <td>{{ $newsItem->title }}</td>
          <td>{{ $newsItem->image }}</td>
          <td>
            <div class="btn-group">
              <a href="{{ route("admin.news.edit", ["news" => $newsItem]) }}" class="btn btn-sm btn-primary mr-1">edit</a>
              <form action="{{ route("admin.news.destroy", ["news" => $newsItem]) }}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">delete</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colpan="4"><h5>No avalaible news for now!</h5></td>  
        </tr>  
      @endforelse
    </tbody>
  </table>

@endsection