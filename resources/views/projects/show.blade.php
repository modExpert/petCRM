<x-app-layout>
    <x-slot name="header">
        <h2>Просмотр проекта</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <p class="card-text"><strong>Клиент:</strong> {{ $project->client ? $project->client->name : 'Не указан' }}</p>
                            <p class="card-text"><strong>Создан:</strong> {{ \Carbon\Carbon::createFromTimestamp($project->created_at_unix)->toDateTimeString() }}</p>
                        </div>
                    </div>
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Вернуться</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
