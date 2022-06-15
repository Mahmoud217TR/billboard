@extends('layouts.app')

@section('title',$advertisement->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body container">
                    <div class="row">
                        <div class="col">
                            <h1 class="card-title">{{ $advertisement->title }}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @if ($advertisement->featured)
                                <span class="badge rounded-pill bg-success mb-2">
                                    Featured
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="card-content">{{ $advertisement->description }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex">
                            @can('update',$advertisement)
                                <a href="{{ route('advertisement.edit',$advertisement) }}" class="btn btn-success me-2">Edit</a>
                            @endcan
                            @can('delete',$advertisement)
                                <form action="{{ route('advertisement.destroy',$advertisement) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger me-2">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between text-muted">
                    <p class="mb-0">Author: {{ $advertisement->user->name }}</p>
                    <p class="mb-0">Posted at: {{ $advertisement->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection