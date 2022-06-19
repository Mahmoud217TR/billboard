@extends('layouts.app')

@section('title','Create a new Advertisement')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title mb-0">Create a new Advertisement</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('advertisement.store') }}" method="post">
                        @csrf
                        @include('advertisement.form')
                        <div class="row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-dark">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection