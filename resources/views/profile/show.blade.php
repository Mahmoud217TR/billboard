@extends('layouts.app')

@section('title', $profile->user->name."'s Profile")

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-lg-5">
            <div class="card">
                <div class="row mt-3">
                    <div class="col d-flex justify-content-center">
                        <img class="rounded-circle bg-white" src="{{ $profile->avatar() }}" alt="profile picture" width="300" height="300">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-content p-2">
                            <h1 class="card-title text-center">{{ $profile->user->name }}</h1>
                            <p class="text-center">
                                Joined in: {{ $profile->created_at->format('d-M-Y') }}
                            </p>
                            @if ($profile->phone)
                                <p class="text-center text-warning fw-bold">Phone Number: {{ $profile->phone }}</p>
                            @endif
                            @if ($profile->address)
                                <p class="text-center text-primary fw-bold">Address: {{ $profile->address }}</p>
                            @endif
                            <p class="text-center text-success fw-bold">
                                Number of Advertisments: {{ $profile->user->advertisements->count() }}
                            </p>
                            <div class="d-flex justify-content-center">
                                @can('update', $profile)
                                    <a href="{{ route('profile.edit', $profile) }}" class="btn btn-success">Edit</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
