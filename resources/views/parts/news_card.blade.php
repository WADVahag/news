<div class="card my-3" style="width: 21rem;">
    <img src="{{$newsItem->image_url }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $newsItem->title }}</h5>
        <p class="card-text text-truncate">{{ $newsItem->body }}</p>
        <a href="{{ route("news.show", ["news" => $newsItem]) }}" class="btn btn-primary">View</a>
    </div>
</div>