@extends('layouts.app')

@section('title','Billboard')

@section('content')
    @forelse ($advertisements as $advertisement)
        {{-- {{ $advertisement->title }} --}}
    @empty
        <h1>Nothing to Show here.</h1>
    @endforelse
@endsection