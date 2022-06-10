@extends('layouts.app')

@section('title','Create a new Advertisement')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Create a new Advertisement</h1>
            <form action="{{ route('advertisement.store') }}" method="post">
                @csrf
                @include('advertisement.form')
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection