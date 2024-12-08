@extends('frontend.layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Create Task</h2>
                <form action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">description</label>
                        <input type="text" name="description" id="description" class="form-control"
                            placeholder="Enter description">
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" name="img_url" type="file" id="formFile">
                        @error('img_url')
                            <div class="text-danger">{{ $message }}</div>
                            
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="due_date">due_date</label>
                        <input type="date" name="due_date" id="due_date" class="form-control"
                            placeholder="Enter due_date">
                            @error('due_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
