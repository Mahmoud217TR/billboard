@extends('layouts.app')

@section('title', 'Edit '.$category->name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title mb-0">
                            Edit {{ $category->name }}
                        </h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update',$category) }}" method="post">
                            @csrf
                            @method('PATCH')
                            @include('categories.form')
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection