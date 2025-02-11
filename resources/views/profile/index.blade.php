@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Личный кабинет</h1>
        <p>Имя: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Телефон: {{ $user->phone ?? 'Не указан' }}</p>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Редактировать данные</a>
    </div>
@endsection
