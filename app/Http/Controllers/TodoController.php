<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = auth()->user()->todos; // logged user's todo
        return Inertia::render('ToDo/index', [
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ToDo/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date|after_or_equal:today',
        ]);

        // If user didn't provide due_date, set it to today
        if (empty($validatedData['due_date'])) {
            $validatedData['due_date'] = now();
        }

        $user = auth()->user();

        if (!$user) {
            return redirect()->route('todo.index')
            ->with('message', 'Unauthorized access.')
            ->with('type', 'error');
        }

        // Create the task with the validated data
        $user->todos()->create($validatedData);

        return redirect()->route('todo.index')
        ->with('message', 'Task created successfully.')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // task by its ID
        $task = Todo::findOrFail($id);

        // authenticated user
        $user = auth()->user();

        // Check authenticated user
        if (!$user || $task->user_id !== $user->id) {
            return redirect()->route('todo.index')
            ->with('message', 'Unauthorized access to this task.')
            ->with('type', 'error');
        }

        // Pass the task data to the Inertia view as a prop
        return Inertia::render('ToDo/edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validations
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date|after_or_equal:today',
        ]);

        // If user didn't provide due_date, set it to today
        if (empty($validatedData['due_date'])) {
            $validatedData['due_date'] = now();
        }

        $user = auth()->user();

        if (!$user) {
            return redirect()->route('todo.index')
            ->with('message', 'Unauthorized access.')
            ->with('type', 'error');
        }

        // Find the task by its ID
        $task = Todo::findOrFail($id);

        // Check if the logged-in user is the owner of the task
        if ($task->user_id !== $user->id) {
            return redirect()->route('todo.index')
            ->with('message', 'Unauthorized access to this task.')
            ->with('type', 'error');
        }

        // Update the task with the validated data
        $task->update($validatedData);

        return redirect()->route('todo.index')
        ->with('message', 'Task updated successfully.')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $user = auth()->user();

        if (!$user || $todo->user_id !== $user->id) {
            return redirect()->route('todo.index')
                ->with('message', 'Unauthorized access to this task.')
                ->with('type', 'error');
        }

        // Perform deletion
        $todo->delete();

        return redirect()->route('todo.index')
        ->with('message', 'Task deleted successfully.')
        ->with('type', 'info');
    }
}
