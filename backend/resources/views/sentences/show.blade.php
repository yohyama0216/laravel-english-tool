@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sentence Details</h1>
    <div class="card">
        <div class="card-header">
            Sentence #{{ $sentence->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Sentence</h5>
            <p class="card-text">{{ $sentence->sentence }}</p>
            <h5 class="card-title">Difficulty</h5>
            <p class="card-text">{{ $sentence->difficulty }}</p>
            <h5 class="card-title">Word Count</h5>
            <p class="card-text">{{ $sentence->word_count }}</p>
            <a href="{{ route('sentences.edit', $sentence->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('sentences.destroy', $sentence->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
