<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Список проектов текущего пользователя
    public function index()
    {
        $projects = auth()->user()->projects()->with('client')->get();
        return view('projects.index', compact('projects'));
    }

    // Форма создания проекта
    public function create()
    {
        $clients = auth()->user()->clients; // Клиенты текущего пользователя
        return view('projects.create', compact('clients'));
    }

    // Сохранение проекта
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'client_id' => 'nullable|exists:clients,id',
        ]);

        // Создаем проект и привязываем его к текущему пользователю
        auth()->user()->projects()->create([
            'name' => $request->name,
            'created_at_unix' => now()->timestamp, // Текущее время в формате Unix
            'client_id' => $request->client_id,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    // Просмотр проекта
    public function show(Project $project)
    {
        // Проверяем, что проект принадлежит текущему пользователю
        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('projects.show', compact('project'));
    }

    // Форма редактирования проекта
    public function edit(Project $project)
    {
        // Проверяем, что проект принадлежит текущему пользователю
        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $clients = auth()->user()->clients; // Клиенты текущего пользователя
        return view('projects.edit', compact('project', 'clients'));
    }

    // Обновление проекта
    public function update(Request $request, Project $project)
    {
        // Проверяем, что проект принадлежит текущему пользователю
        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required',
            'client_id' => 'nullable|exists:clients,id',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    // Удаление проекта
    public function destroy(Project $project)
    {
        // Проверяем, что проект принадлежит текущему пользователю
        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
