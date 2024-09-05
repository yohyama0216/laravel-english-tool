@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Learning</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p><strong>Sentence:</strong> {{ $sentence->sentence }}</p>
            <form action="{{ route('learning.check') }}" method="POST">
                @csrf
                <input type="hidden" name="sentence_id" value="{{ $sentence->id }}">
                <div class="form-group">
                    <label for="user_input">Type the sentence exactly:</label>
                    <input type="text" name="user_input" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
