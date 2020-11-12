@extends('layouts.app')

@section('content')
    
  <div class="col-lg-12 d-flex justify-content-between mb-2">
    <h3>Categories</h3>
    <a href="{{ route("admin.categories.create") }}" class="btn btn-primary">+ categories</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">name</th>
      </tr>
    </thead>
    <tbody>`
      @forelse ($categories as $category)
        <tr>
          {{-- project is too simple to encrypt ids  --}}
          <th scope="row">{{ $category->id }}</th>
          <td>{{ $category->name }}</td>
          <td>
            <div class="btn-group">
              <a href="{{ route("admin.categories.edit", ["category" => $category]) }}" class="btn btn-sm btn-primary mr-1">edit</a>
              <form action="{{ route("admin.categories.destroy", ["category" => $category]) }}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">delete</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colpan="4"><h5>No avalaible categories for now!</h5></td>  
        </tr>  
      @endforelse
    </tbody>
  </table>

@endsection