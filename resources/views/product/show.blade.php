@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="card mb-4 shadow-sm border-0">
    <div class="row g-0">
        <!-- Product Image -->
        <div class="col-md-5">
            <img 
                src="{{ asset('/img/' . $viewData['product']->getImage()) }}" 
                class="img-fluid rounded-start h-100 object-fit-cover" 
                alt="{{ $viewData['product']->getName() }}"
            >
        </div>

        <!-- Product Info -->
        <div class="col-md-7">
            <div class="card-body">
                <h3 class="card-title fw-bold">
                    {{ $viewData["product"]->getName() }}
                </h3>
                <h4 class="text-primary mb-3">
                    ${{ $viewData["product"]->getPrice() }}
                </h4>
                <p class="card-text">
                    {{ $viewData["product"]->getDescription() }}
                </p>

                <div class="mt-4">
                    <button class="btn btn-success btn-lg w-100">
                        🛒 Add to Cart
                    </button>
                </div>

                <p class="card-text mt-3">
                    <small class="text-muted">
                        Product ID: {{ $viewData["product"]->getId() }}
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
