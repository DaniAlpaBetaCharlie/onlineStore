@extends('layouts.app')
@section('title', $viewData["title"])

@section('content')
<div class="row">
    <!-- Product 1 -->
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm h-100">
            <img src="{{ asset('/img/game.png') }}" class="card-img-top" alt="Game">
            <div class="card-body text-center">
                <h5 class="card-title">Game Console</h5>
                <p class="card-text text-muted">$299</p>
                <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
            </div>
        </div>
    </div>

    <!-- Product 2 -->
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm h-100">
            <img src="{{ asset('/img/safe.png') }}" class="card-img-top" alt="Safe">
            <div class="card-body text-center">
                <h5 class="card-title">Safe Box</h5>
                <p class="card-text text-muted">$149</p>
                <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
            </div>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm h-100">
            <img src="{{ asset('/img/submarine.png') }}" class="card-img-top" alt="Submarine">
            <div class="card-body text-center">
                <h5 class="card-title">Toy Submarine</h5>
                <p class="card-text text-muted">$99</p>
                <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
            </div>
        </div>
    </div>
</div>
@endsection
