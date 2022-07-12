@extends('layouts.default')
@section('title', 'Novo Usuario')

@section('content')
<section class="text-gray-600 py-16">

<div class="container px-5 pt-8 pb-24 mx-auto w-full">


    <div class="w-full mx-auto overflow-auto">
        <div class="flex items-center justify-between mb-2">
            <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">
            Cadastrar novo usuario
            </h1>
            <a href="{{ route('admin.users.index') }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none
            hover:bg-indigo-600 rounded">
                Voltar
            </a>
            <center>
    
            @if ($errors->any())
                <div>
                    @foreach($errors->all() as $error)
                        {{$error }}
                    @endforeach
                </div>
            @endif

            <form  action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div >
                <label for="name" >Nome</label>
                <input type="text"  id="name"  name="name">
            </div>
            <div >
                <label for="email" >Email</label>
                <input type="email"  id="email"  name="email">
            </div>
            <div >
                <label for="phone" >Telefone</label>
                <input type="text"  id="phone"  name="phone">
            </div>
            <div class="mb-3">
                <label for="address" >Endereço</label>
                <input type="text"  id="address"  name="address">
            </div>
            <div >
                <label for="birthday" >Aniversario</label>
                <input type="date"  id="birthday"  name="birthday">
            </div>
            <div >
                <label for="cpf" >CPF</label>
                <input type="text"  id="cpf"  name="cpf">
            </div>
            <div >
                <label for="password" >Senha</label>
                <input type="password" id="password" name="password">
            </div>
            
            <button type="submit">Enviar</button>
            </form>
        </center>

@endsection
