@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Sentence</h1>
    <form action="{{ route('sentences.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sentence">Sentence</label>
            <textarea name="sentence" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="difficulty">Difficulty (1-5)</label>
            <input type="number" name="difficulty" class="form-control" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label for="word_count">Word Count</label>
            <input type="number" name="word_count" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
