@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit Product
    </div>
    <div class="card-body">
        {{-- Error Validation --}}
        @if ($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{-- Edit Form --}}
        <form method="POST" 
              action="{{ route('admin.product.update', ['id' => $viewData['product']->getId()]) }}" 
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Name --}}
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input 
                                type="text" 
                                name="name" 
                                value="{{ $viewData['product']->getName() }}" 
                                class="form-control">
                        </div>
                    </div>
                </div>

                {{-- Price --}}
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input 
                                type="number" 
                                name="price" 
                                value="{{ $viewData['product']->getPrice() }}" 
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Image --}}
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input 
                                type="file" 
                                name="image" 
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    &nbsp;
                </div>
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea 
                    name="description" 
                    class="form-control" 
                    rows="3">{{ $viewData['product']->getDescription() }}</textarea>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection
