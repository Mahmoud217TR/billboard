<div class="row">
    @forelse ($advertisements as $advertisement)
        <div class="col-md-4 mb-4">
             @include('advertisement.card')
        </div>
    @empty
        <div class="col mb-4">
            <div class="bg-white rounded p-5 d-flex justify-content-center">
                <h1 class="display-5">Nothing to show here.</h1>
            </div>
        </div>
    @endforelse
</div>