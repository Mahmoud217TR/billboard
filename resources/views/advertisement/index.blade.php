@extends('layouts.app')

@section('title','Billboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center mb-4">
                <h1 class="display-5 bg-white rounded">Advertisements</h1>
            </div>
        </div>
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
        @if ($advertisements->count())
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <!-- Previous link -->
                    @if($advertisements->currentPage() > 1)
                        <a class="btn btn-dark" href="{{ $advertisements->previousPageUrl() }}">Previous</a>
                    @endif

                    <!-- Current Page Number -->
                    <span class="d-block bg-light mx-2 p-2 rounded"> {{ $advertisements->currentPage() }} </span>

                    <!-- Next link -->
                    @if($advertisements->hasMorePages())
                        <a class="btn btn-dark" href="{{ $advertisements->nextPageUrl() }}">Next</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection