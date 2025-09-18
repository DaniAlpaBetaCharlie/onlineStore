@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Create Products
    </div>
    <div class="card-body">

        {{-- Menampilkan error validasi --}}
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('admin.product.store') }}"enctype="multipart/form-data">
            @csrf

            <div class="row">
                {{-- Input Name --}}
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}" 
                                class="form-control"
                            >
                        </div>
                    </div>
                </div>

                {{-- Input Price --}}
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input 
                                type="number" 
                                name="price" 
                                value="{{ old('price') }}" 
                                class="form-control"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
    <div class="col">
        <div class="mb-3 row">
            {{-- Label Input Gambar --}}
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>

            {{-- Input File --}}
            <div class="col-lg-10 col-md-6 col-sm-12">
                <input 
                    type="file" 
                    name="image" 
                    class="form-control"
                >
            </div>
        </div>
    </div>

    {{-- Kolom kosong untuk keseimbangan grid --}}
    <div class="col">
        &nbsp;
    </div>
</div>

            {{-- Input Description --}}
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea 
                    class="form-control" 
                    name="description" 
                    rows="3"
                >{{ old('description') }}</textarea>
            </div>

            {{-- Tombol Submit --}}
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Manage Products
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["products"] as $product)
                <tr>
                    <td>{{ $product->getId() }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>
                        {{--<button class="btn btn-primary">--}}
                        <a class="btn btn-primary" href="{{route('admin.product.edit', ['id'=> $product->getId()])}}">    
                            <i class="bi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.product.delete', $product->getId()) }}" 
      method="POST" 
      style="display: inline;">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger btn-sm">
        <i class="bi bi-trash"></i>
    </button>
</form>

                    </td>
                    {{-- <td>
                        <a href="{{ route('admin.Product.edit', $product->getId()) }}" class="btn btn-sm btn-primary"> 
                            
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.Product.destroy', $product->getId()) }}" method="POST"> 
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus produk ini?')"> 
                                
                            </button> 
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
