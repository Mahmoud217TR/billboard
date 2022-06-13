<div class="card">
    <div class="card-body">
        <h5 class="card-title truncate-2-lines">
            {{ $advertisement->title }}
        </h5>
        @if ($advertisement->featured)
            <span class="badge rounded-pill bg-success mb-2">
                Featured
            </span>
        @endif
        <p class="card-text truncate-3-lines">
            {{ $advertisement->description }}
        </p>
        <a href="{{ route('advertisement.show',$advertisement) }}" class="btn btn-primary">Check it out</a>
    </div>
</div>