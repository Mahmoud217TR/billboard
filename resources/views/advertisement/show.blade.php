@extends('layouts.app')

@section('title',$advertisement->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{ $advertisement->title }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>{{ $advertisement->description }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @can('update',$advertisement)
                <a href="{{ route('advertisement.edit',$advertisement) }}" class="btn btn-success">Edit</a>
            @endcan
            @can('delete',$advertisement)
                <a href="#" class="btn btn-danger">Delete</a>
            @endcan
        </div>
    </div>
</div>
@endsection