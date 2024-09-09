@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Learning Histories</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Learned At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($learningHistories as $history)
            <tr>
                <td>{{ $history->id }}</td>
                <td>{{ $history->subject }}</td>
                <td>{{ $history->description }}</td>
                <td>{{ $history->learned_at }}</td>
                <td>
                    <a href="{{ route('learning_histories.show', $history->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('learning_histories.edit', $history->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('learning_histories.destroy', $history->id) }}" method="POST" style="display:inline;">
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
