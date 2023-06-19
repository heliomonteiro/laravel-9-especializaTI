@extends('layouts.app')

@section('title','Novo Usuário')

@section('content')

<h1>Editar o Usuário {{ $user->name }}</h1>

@include('includes.validations-forms')

<form action="{{ route('users.update', $user->id) }}" method="post">
    <!-- <input type="hidden" name="_method" value="PUT" /> -->
    @method('PUT')
    @include('users._partials.form')
</form>

@endsection