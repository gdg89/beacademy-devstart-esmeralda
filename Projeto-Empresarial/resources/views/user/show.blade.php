@extends('layouts.default')
@section('title', 'Informações do Usuário')

@section('content')

<section class="section-container">

    <div class="inline-flex flex-col">
        <div class="flex items-center">
            <img class="avatar w-20 h-20" src="{{ $user->avatar }}" alt="{{ $user->name }}">

            <div class="pl-4 flex flex-col gap-2">
                <h1 class="title">{{ $user->name }}</h1>
                <span class="text-sm">Criado em {{  $user->created_at->format('d/m/Y - H:i:s') }}</span>
            </div>
        </div>

        <a href="{{ route('user.edit', $user->id) }}" class="btn-primary w-full mt-4">
            Editar
        </a>

    </div>

    <div class="flex flex-col gap-4 mt-8">
        <p>
            <strong>Nome:</strong>
            <span>{{ $user->name }}</span>
        </p>
        <p>
            <strong>Email:</strong>
            <span>{{ $user->email }}</span>
        </p>
        <p>
            <strong>CPF:</strong>
            <span>{{ $user->cpf }}</span>
        </p>
        <p>
            <strong>Data de Nascimento:</strong>
            <span>{{ date('d/m/Y', strtotime($user->birthday)) }}</span>
        </p>
        <p>
            <strong>Telefone:</strong>
            <span>{{ $user->phone }}</span>
        </p>
        <p>
            <strong>Cidade:</strong>
            <span>{{ $user->city }}</span>
        </p>
        <p>
            <strong>Estado:</strong>
            <span>{{ $user->state }}</span>
        </p>
        <p>
            <strong>Bairro:</strong>
            <span>{{ $user->district }}</span>
        </p>
        <p>
            <strong>Rua:</strong>
            <span>{{ $user->street }}</span>
        </p>
        <p>
            <strong>Número:</strong>
            <span>{{ $user->number }}</span>
        </p>
        <p>
            <strong>Complemento:</strong>
            <span>{{ $user->complement }}</span>
        </p>


    </div>
</section>

@endsection
