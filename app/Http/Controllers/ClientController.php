<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Получаем клиентов только для текущего пользователя
        $clients = auth()->user()->clients;
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        // Создаем клиента и привязываем его к текущему пользователю
        auth()->user()->clients()->create($request->all());

        return redirect()->route('clients.index')->with('success', 'Клиент создан.');
    }

    public function show(Client $client)
    {
        // Проверяем, что клиент принадлежит текущему пользователю
        if ($client->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        // Проверяем, что клиент принадлежит текущему пользователю
        if ($client->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        // Проверяем, что клиент принадлежит текущему пользователю
        if ($client->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        // Проверяем, что клиент принадлежит текущему пользователю
        if ($client->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
