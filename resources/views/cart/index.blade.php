@extends('layouts.app')

@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="card">
    <div class="card-header">
        Products in Cart
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($viewData['products'] as $product)
                    <tr>
                        <td>{{ $product->getId() }}</td>
                        <td>{{ $product->getName() }}</td>
                        <td>${{ number_format($product->getPrice(), 2) }}</td>
                        <td>{{ session('products')[$product->getId()] ?? 0 }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted">Your cart is empty.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="row">
            <div class="col text-end">
                <span class="btn btn-outline-secondary mb-2">
                    <b>Total to pay:</b> ${{ number_format($viewData['total'], 2) }}
                </span>
                @if (count($viewData["products"]) > 0)
                <button href="{{ route('cart.purchase') }}" class="btn btn-primary mb-2">
                    Purchase
                </button>
                <form action="{{ route('cart.delete') }}" method="GET" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger mb-2">
                        Remove all products from Cart
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
