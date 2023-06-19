@extends('layouts.app')

@section('title','Novo Usuário')

@section('content')

<h1>Novo Usuário</h1>

@include('includes.validations-forms')

<form action="{{ route('users.store') }}" method="post">
    <!-- {{ csrf_token() }} -->
    @include('users._partials.form')
</form>

@endsection