@extends('layouts.default')
@section('title', 'Informações do Usuário')

@section('content')

@if (session()->has('edit'))
@include('shared.notifications.info', ['message' => session('edit')])
@endif

<section class="section-container">

    <div class="flex flex-col lg:flex-row gap-8 items-start">

        <div class="inline-flex flex-col p-5 shadow-xl py-8 px-5 rounded-md w-full lg:w-1/2 lg:max-w-[350px]">
            <div class="flex items-center">
                <img class="avatar w-20 h-20" src="{{ $user->avatar }}" alt="{{ $user->name }}">

                <div class="pl-4 flex flex-col gap-2">
                    <h1 class="title">{{ $user->name }}</h1>
                    <span class="text-sm">Cadastrado em {{  $user->created_at->format('d/m/Y') }}</span>
                </div>
            </div>

            <a href="{{ route('user.edit', $user->id) }}" class="btn-primary w-full mt-4">
                Editar
            </a>
        </div>

        <div class="flex flex-col gap-4 w-full p-5 rounded-lg bg-emerald-50 border border-emerald-200">
            <h2 class="title">Seus dados</h2>

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
                <strong>País:</strong>
                <span>Brasil</span>
            </p>
            <p>
                <strong>CEP:</strong>
                <span>{{ $user->cep }}</span>
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

    </div>


    <div class="flex flex-col gap-4 mt-8">
        <h2 class="title">Pedidos</h2>

        @if ($user->orders->count() === 0)
        <p>Você não tem pedidos feitos</p>

        @else
        <div class="w-full mx-auto overflow-auto">

            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="table-th">
                            #
                        </th>

                        <th class="table-th text-center">
                            Qtd
                        </th>

                        <th class="table-th text-center">
                            Total (R$)
                        </th>

                        <th class="table-th">
                            Status
                        </th>

                        <th class="table-th text-center">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @foreach ($user->orders as $order)
                    <tr class="table-tr">
                        <td class="px-4 py-3">{{ $order->id }}</td>
                        <td class="text-center px-4 py-3">{{ $order->quantity }}</td>
                        <td class="text-center px-4 py-3">{{ $order->total }}</td>
                        <td class="px-4 py-3">
                            @include('shared.status.badge')
                        </td>
                        <td class="px-4 py-3 text-sm text-center">
                            <a href="{{ route('user.order', ['user' => $user->id, 'order' => $order->id]) }}"
                                title="Visualizar pedido {{ $order->id }}"
                                class="text-indigo-600 hover:text-indigo-500 inline-flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @endif

    </div>






</section>

@endsection
