@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Sentence</h1>
    <form action="{{ route('sentences.update', $sentence->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="sentence">Sentence</label>
            <textarea name="sentence" class="form-control" rows="3" required>{{ $sentence->sentence }}</textarea>
        </div>
        <div class="form-group">
            <label for="difficulty">Difficulty (1-5)</label>
            <input type="number" name="difficulty" class="form-control" min="1" max="5" value="{{ $sentence->difficulty }}" required>
        </div>
        <div class="form-group">
            <label for="word_count">Word Count</label>
            <input type="number" name="word_count" class="form-control" value="{{ $sentence->word_count }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
