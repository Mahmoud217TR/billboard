@extends('layouts.app')

@section('title','Uncategorized Advertisements')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center mb-4">
                <h1 class="display-5 bg-white rounded p-4">Uncategorized Advertisements</h1>
            </div>
        </div>
        @include('advertisement.group')
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