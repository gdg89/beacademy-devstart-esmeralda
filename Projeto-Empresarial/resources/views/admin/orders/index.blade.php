@extends('layouts.default')
@section('title', 'Admin Pedidos')

@section('content')

<section class="section-container">
    @include('shared.search')

    <h1 class="title mt-12 mb-8">
        Pedidos
    </h1>

    <div class="w-full mx-auto overflow-auto">

        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
                <tr>
                    <th class="table-th">
                        #
                    </th>

                    <th class="table-th">
                        Cliente
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

                @foreach ($orders as $order)
                <tr class="even:bg-gray-100 odd:bg-white">
                    <td class="px-4 py-3">{{ $order->id }}</td>
                    <td class="px-4 py-3">{{ $order->user->email }}</td>
                    <td class="text-center px-4 py-3">{{ $order->quantity }}</td>
                    <td class="text-center px-4 py-3">{{ $order->total }}</td>
                    <td class="px-4 py-3">
                        @include('shared.status')
                    </td>
                    <td class="px-4 py-3 text-sm text-right">
                        <a href="{{ route('admin.orders.show', $order->id) }}"
                            title="Visualizar pedido {{ $order->id }}"
                            class="text-indigo-500 hover:text-indigo-600 inline-flex items-center justify-center">
                            Visualizar
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="py-12">
        {{ $orders->links() }}
    </div>
</section>

@endsection
