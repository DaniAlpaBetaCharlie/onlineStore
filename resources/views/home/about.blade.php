@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <!-- Description -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary mb-3">Description</h5>
                    <p class="card-text lead">{{ $description }}</p>
                </div>
            </div>
        </div>

        <!-- Author -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-success mb-3">Author</h5>
                    <p class="card-text lead">{{ $author }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
