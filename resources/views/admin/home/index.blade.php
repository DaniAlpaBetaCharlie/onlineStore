@extends('layouts.admin')

@section('title', $viewData["title"])

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold">
        Admin Panel - Home Page
    </div>
    <div class="card-body">
        <p class="mb-0">
            Welcome to the Admin Panel, use the sidebar to navigate between the different options.
        </p>
    </div>
</div>
@endsection
