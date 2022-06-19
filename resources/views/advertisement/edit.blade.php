@extends('layouts.app')

@section('title','Edit '.$advertisement->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Edit an Advertisement</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('advertisement.update',$advertisement) }}" method="post">
                        @csrf
                        @method('patch')
                        @include('advertisement.form')
                        <div class="row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-dark">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection