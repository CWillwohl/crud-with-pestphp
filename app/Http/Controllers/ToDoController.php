<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Http\Requests\ToDoRequest;
use App\Http\Requests\StoreToDoRequest;
use App\Http\Requests\UpdateToDoRequest;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'toDos' => ToDo::all(),
        ];

        return view('to-do.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('to-do.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToDoRequest $request)
    {

        ToDo::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('toDo.index')
                        ->with('success', 'To Do created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $toDo)
    {

        $data = [
            'toDo' => $toDo,
        ];

        return view('to-do.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToDoRequest $request, ToDo $toDo)
    {
        $toDo->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'completed' => $request->completed,
        ]);

        return redirect()->route('toDo.index')
                        ->with('success', 'To Do updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $toDo)
    {
        $toDo->delete();

        return redirect()->route('toDo.index')
                        ->with('success', 'To Do deleted successfully');
    }
}
