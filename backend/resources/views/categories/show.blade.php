@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Category Details</h1>
    <div class="card">
        <div class="card-header">
            Category #{{ $category->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name</h5>
            <p class="card-text">{{ $category->name }}</p>
            <h5 class="card-title">Description</h5>
            <p class="card-text">{{ $category->description }}</p>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
