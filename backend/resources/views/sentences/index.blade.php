@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sentences</h1>
    <a href="{{ route('sentences.create') }}" class="btn btn-primary mb-3">Add New Sentence</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sentence</th>
                <th>Difficulty</th>
                <th>Word Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sentences as $sentence)
            <tr>
                <td>{{ $sentence->id }}</td>
                <td>{{ $sentence->sentence }}</td>
                <td>{{ $sentence->difficulty }}</td>
                <td>{{ $sentence->word_count }}</td>
                <td>
                    <a href="{{ route('sentences.show', $sentence->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('sentences.edit', $sentence->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('sentences.destroy', $sentence->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
