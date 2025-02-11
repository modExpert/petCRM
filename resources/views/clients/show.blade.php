<x-app-layout>
    <x-slot name="header">
        <h2>Client Details</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $client->name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
                            <p class="card-text"><strong>Phone:</strong> {{ $client->phone }}</p>
                            <p class="card-text"><strong>Address:</strong> {{ $client->address }}</p>
                        </div>
                    </div>
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary mt-3">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
