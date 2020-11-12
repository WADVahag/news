<div class="col-lg-4">

  <aside id="sidebar">
    <ul class="list-group">
      @forelse ($categories as $category)
        <li class="list-group-item">
          <a href="{{ route("category.show", ["category" => $category]) }}" class="nav-link d-flex justify-content-between align-items-center">
            {{ $category->name }} 
            <span class="badge badge-secondary">{{$category->news_count}}</span>
          </a>
        </li>  
      @empty
          
      @endforelse
    </ul>
  </aside>

</div>