<x-app-layout>
    <x-slot name="header">
        <h2>Добавление клиента</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <textarea name="address" id="address" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Создать</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Отменить</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
