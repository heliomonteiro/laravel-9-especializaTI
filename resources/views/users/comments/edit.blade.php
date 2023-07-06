@extends('layouts.app')

@section('title',"Editar o Comentário do Usuário {$user->name}")

@section('content')

<h1 class="text-2xl font-semibold leading-tigh py-2">Editar o Comentário do Usuário {{ $user->name }}</h1>

@include('includes.validations-forms')

<form action="{{ route('comments.update', $comment->id) }}" method="post">
    <!-- <input type="hidden" name="_method" value="PUT" /> -->
    @method('PUT')
    @include('users.comments._partials.form')
</form>

@endsection