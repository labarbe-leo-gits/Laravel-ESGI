<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Project;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tasks::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task = Tasks::create($validated);

        return redirect()->route('tasks.show', $task->id)->with('success', 'Tâche créée avec succès !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $task)
    {
        $task = Tasks::find($task->id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task'), compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $task)
    {
        /* $task->status = true;
        $saved = $task->save();
        
        if ($saved) {
            return redirect()->back()->with('success', 'Tâche marquée comme complétée !');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour.');
        } */
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|boolean',
            'project_id' => 'required',
        ]);

        $task->update($validated);

        return redirect()->back()->with('success', 'Tâche mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès !');
    }
}
