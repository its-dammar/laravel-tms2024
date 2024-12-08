@extends('frontend.layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Task Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Title:</strong>
                            <p>{{ $tasks->title }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Description:</strong>
                            <p>{{ $tasks->description }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Image:</strong>
                            @if($tasks->img_url)
                                <img src="{{ asset('uploads/' . $tasks->img_url) }}" alt="Task Image" width="200">
                            @else
                                <p>No image uploaded.</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <strong>Due Date:</strong>
                            <p>{{ \Carbon\Carbon::parse($tasks->due_date)->format('Y-m-d') }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('tasks.edit', $tasks->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', $tasks->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
