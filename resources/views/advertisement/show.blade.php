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
                            @include('advertisement.badges')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="card-content">{{ $advertisement->description }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @include('advertisement.controls')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="mb-0 text-bold">
                                @foreach ($advertisement->tags as $tag)
                                    <a class="unstyled" href="{{ route('tag.show',$tag) }}">#{{ $tag->name }}</a> 
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer row text-muted">
                    <p class="col-md mb-0">Author: {{ $advertisement->user->name }}</p>
                    <p class="col-md mb-0 text-md-end">Posted at: {{ $advertisement->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection