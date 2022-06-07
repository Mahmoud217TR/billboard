@extends('layouts.app')

@section('title','Billboard')

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($advertisements as $advertisement)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $advertisement->title }}
                            </h5>
                            <p class="card-text truncate-3-lines">
                                {{ $advertisement->description }}
                            </p>
                            <a href="{{ route('advertisement.show',$advertisement) }}" class="btn btn-primary">Check it out</a>
                        </div>
                    </div>
                </div>
            @empty
                <h1>Nothing to Show here.</h1>
            @endforelse
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <!-- Previous link -->
                @if($advertisements->currentPage() > 1)
                    <a class="btn btn-secondary" href="{{ $advertisements->previousPageUrl() }}">Previous</a>
                @endif

                <!-- Current Page Number -->
                <span class="d-block bg-dark text-light mx-2 p-2 rounded"> {{ $advertisements->currentPage() }} </span>

                <!-- Next link -->
                @if($advertisements->hasMorePages())
                    <a class="btn btn-secondary" href="{{ $advertisements->nextPageUrl() }}">Next</a>
                @endif
            </div>
        </div>
    </div>
@endsection