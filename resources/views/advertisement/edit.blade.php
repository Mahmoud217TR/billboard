@extends('layouts.app')

@section('title','Edit '.$advertisement->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Edit an Advertisement</h1>
            <form action="{{ route('advertisement.update',$advertisement) }}" method="post">
                @csrf
                @method('patch')
                @include('advertisement.form')
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection