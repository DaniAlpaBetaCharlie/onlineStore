@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
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
                    <td>Edit</td>
                    <td>Delete</td>
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
