@extends('layouts.default')
@section('title', 'Informações do Usuário')

@section('content')

<section class="section-container">

    <div class="inline-flex flex-col">
        <div class="flex items-center">
            <img class="avatar w-20 h-20" src="{{ $user->avatar }}" alt="{{ $user->name }}">

            <div class="pl-4 flex flex-col gap-2">
                <h1 class="title">{{  Auth::user()->name }}</h1>
                <span class="text-sm">Criado em {{  Auth::user()->created_at->format('d/m/Y - H:i:s') }}</span>
            </div>
        </div>

        <a href="{{ route('user.edit', $user->id) }}" class="btn-primary w-full mt-4">
            Editar
        </a>

    </div>

    <div class="flex flex-col gap-4 mt-8">
        <p>
            <strong>Nome:</strong>
            <span>{{ Auth::user()->name }}</span>
        </p>
        <p>
            <strong>Email:</strong>
            <span>{{ Auth::user()->email }}</span>
        </p>
        <p>
            <strong>CPF:</strong>
            <span>{{  Auth::user()->cpf }}</span>
        </p>
        <p>
            <strong>Data de Nascimento:</strong>
            <span>{{ date('d/m/Y', strtotime( Auth::user()->birthday)) }}</span>
        </p>
        <p>
            <strong>Telefone:</strong>
            <span>{{  Auth::user()->phone }}</span>
        </p>
        <p>
            <strong>Cidade:</strong>
            <span>{{  Auth::user()->city }}</span>
        </p>
        <p>
            <strong>Estado:</strong>
            <span>{{  Auth::user()->state }}</span>
        </p>
        <p>
            <strong>Bairro:</strong>
            <span>{{  Auth::user()->district }}</span>
        </p>
        <p>
            <strong>Rua:</strong>
            <span>{{  Auth::user()->street }}</span>
        </p>
        <p>
            <strong>Número:</strong>
            <span>{{  Auth::user()->number }}</span>
        </p>
        <p>
            <strong>Complemento:</strong>
            <span>{{  Auth::user()->complement }}</span>
        </p>


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

                        <th class="table-th text-right">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @foreach ($user->orders as $order)
                    <tr class="even:bg-gray-100 odd:bg-white">
                        <td class="px-4 py-3">{{ $order->id }}</td>
                        <td class="text-center px-4 py-3">{{ $order->quantity }}</td>
                        <td class="text-center px-4 py-3">{{ $order->total }}</td>
                        <td class="px-4 py-3">
                            @include('shared.status')
                        </td>
                        <td class="px-4 py-3 text-sm text-right">
                            <a href="{{ route('user.order', ['user' => $user->id, 'order' => $order->id]) }}"
                                title="Visualizar pedido {{ $order->id }}"
                                class="text-emerald-400 hover:text-emerald-600 inline-flex items-center justify-center">
                                Visualizar
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
