<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display a listing of tasks
    public function index()
    {
        $tasks = Task::all(); // Retrieve all tasks
        return view('frontend.tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task
    public function create()
    {
        return view('frontend.tasks.create');
    }

    // Store a newly created task in storage
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'title' => 'required',
            'due_date' => 'required',
            'description' => 'required',
            'img_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $fileName = null;
        if ($request->hasFile('img_url') && $request->file('img_url')->isValid()) {
            $fileName = $request->title . "-" . time() . '.' . $request->img_url->extension();
            $request->img_url->move(public_path('uploads'), $fileName);
        }

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->img_url = $fileName;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Display the specified task
    public function show($id)
    {
        $tasks = Task::findOrFail($id);
        return view('frontend.tasks.views', compact('tasks'));
    }

    // Show the form for editing the specified task
    public function edit($id)
    {
        $tasks = Task::findOrFail($id); // Fetch the task by ID
        return view('frontend.tasks.edit', compact('tasks'));
    }


    // Update the specified task in storage
    public function update(Request $request, Task $task)
    {
        $validate_data = $request->validate([
            'title' => 'required',
            'due_date' => 'required',
            'description' => 'required',
            'img_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $fileName = $task->img_url; // Preserve the old image by default
        if ($request->hasFile('img_url') && $request->file('img_url')->isValid()) {
            // Delete the old image if it exists
            if ($fileName && file_exists(public_path('uploads/' . $fileName))) {
                unlink(public_path('uploads/' . $fileName));
            }
            $fileName = $request->title . "-" . time() . '.' . $request->img_url->extension();
            $request->img_url->move(public_path('uploads'), $fileName);
        }

        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->img_url = $fileName;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Remove the specified task from storage
    public function destroy($id)
    {
        $tasks = Task::findOrFail($id);
        // Delete the associated image file
        if ($tasks->img_url && file_exists(public_path('uploads/' . $tasks->img_url))) {
            unlink(public_path('uploads/' . $tasks->img_url));
        }

        $tasks->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
