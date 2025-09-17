@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="row">
    @foreach ($viewData["products"] as $product)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <img 
                    src="{{ asset('/img/' . $product->getImage()) }}" 
                    class="card-img-top img-fluid" 
                    alt="{{ $product->getName() }}"
                >
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->getName() }}</h5>
                    <p class="card-text text-muted mb-2">
                        ${{ $product->getPrice() }}
                    </p>
                    <a 
                        href="{{ route('product.show', ['id' => $product->getId()]) }}" 
                        class="btn btn-primary w-100"
                    >
                        View Details
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
