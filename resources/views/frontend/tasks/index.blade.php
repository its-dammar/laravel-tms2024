@extends('frontend.layouts.main')
@section('content')
<div class="py-3" >
    <a class="btn btn-primary btn-sm " href="{{route('tasks.create')}}" role="button"> Add </a>
</div>
    <table class="table table-primary table-striped table-hover table-bordered table-sm table-responsive-sm">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Title</th>
                <th scope="col">Img</th>
                <th scope="col">Description</th>
                <th scope="col">Due_date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ( $tasks as $task)
           <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$task->title}}</td>
            <td><img src="{{asset('uploads/'.$task->img_url)}}" width="100" height="100" alt=""></td>
            <td>{{$task->description}}</td>
            <td>{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}</td>
            <td>
                <a class="btn btn-primary btn-sm " href="{{route('tasks.edit', $task->id)}}" role="button">Edit </a>
                <a class="btn btn-info btn-sm " href="{{route('tasks.show', $task->id)}}" role="button">Show </a>
                <a class="btn btn-danger btn-sm " href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog        ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Do you want to delete this task?
                            </div>
                            <div class="modal-footer">
                               <form action="{{route('tasks.destroy', $task->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Delete</button>
                               </form>
                            </div>
                        </div>
                    </div>
            </td>
        </tr>
           @endforeach
        </tbody>
    </table>
@endsection
