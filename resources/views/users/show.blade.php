@extends('layouts.app')

@section('title', 'Listagem do Usuário')

@section('content')
    <h1>Listagem do Usuário {{ $user->name }}</h1>

    <ul>
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li>
    </ul>

    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
        @method('DELETE')
        @csrf
        <button type="submit">Deletar</button>
    </form>

@endsection