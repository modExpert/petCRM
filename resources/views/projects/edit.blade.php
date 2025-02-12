<x-app-layout>
    <x-slot name="header">
        <h2>Редактирование проекта</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('projects.update', $project) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">Название проекта</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="client_id">Клиент (можно не указывать)</label>
                            <select name="client_id" id="client_id" class="form-control">
                                <option value="">Не указывать</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ $project->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Project</button>
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
