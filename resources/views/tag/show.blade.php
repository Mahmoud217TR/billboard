@extends('layouts.app')

@section('title', $tag->name)

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title mb-0">#{{ $tag->name }}</h1>
                    </div>
                    <div class="card-body">
                        @include('tag.controls')
                        <p class="mb-0">
                            {{ $advertisements->total() }} @choice('Advertisement|Advertisements',$advertisements->total())
                            in <span class="text-primary">#{{ $tag->name }}</span> Tag
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    @forelse ($advertisements as $advertisement)
                        <div class="col-md-4 mb-3">
                            @include('advertisement.card')
                        </div>
                    @empty
                        <div class="col text-center">
                            <h2 class="display-5 bg-white rounded p-4">No Advertisements</h2>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        @if ($advertisements)
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