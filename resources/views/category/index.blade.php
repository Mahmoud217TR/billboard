@extends('layouts.app')

@section('title','Categories')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center mb-4">
                <h1 class="display-5 bg-white rounded p-4">Categories</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-light table-striped table-bordered">
                    <tr>
                        <th scope="col">Category Name</th>
                        <th scope="col">Ads</th>
                        <th scope="col">Category Description</th>
                    </tr>
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                            <a class="unstyled fw-bold" href="{{ route('category.show',$category) }}">{{ $category->name }}</a>
                        </td>
                        <td>
                            <p class="mb-0 text-center">{{ $category->advertisements_count }}</p>
                        </td>
                        <td>
                            <p class="mb-0">{{ $category->getDescriptionSummary() }}</p>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @if ($categories->count())
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <!-- Previous link -->
                    @if($categories->currentPage() > 1)
                        <a class="btn btn-dark" href="{{ $categories->previousPageUrl() }}">Previous</a>
                    @endif

                    <!-- Current Page Number -->
                    <span class="d-block bg-light mx-2 p-2 rounded"> {{ $categories->currentPage() }} </span>

                    <!-- Next link -->
                    @if($categories->hasMorePages())
                        <a class="btn btn-dark" href="{{ $categories->nextPageUrl() }}">Next</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection