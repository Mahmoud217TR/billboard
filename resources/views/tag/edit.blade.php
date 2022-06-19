@extends('layouts.app')

@section('title', $tag->name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title mb-0">
                            Edit {{ $tag->name }}
                        </h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tag.update',$tag) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <div class="col-md-4 text-md-end">
                                    <label for="name" class="col-form-label">
                                        Tag Name:
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" value="{{ old('name')??$tag->name }}"
                                    class="form-control @error('name') is-invalid @enderror" required>
                                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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