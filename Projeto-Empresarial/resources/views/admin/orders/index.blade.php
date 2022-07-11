@extends('layouts.default')
@section('title', 'Admin Pedidos')

@section('content')

<section class="section-container">
    @include('shared.search')

    <div class=" pt-16 pb-12">
        {{ $orders->links() }}
    </div>

    <h1 class="title">
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

                    <th class="table-th text-center">
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
                    <td class="px-4 py-3 text-sm text-center">
                        <a href="{{ route('admin.orders.show', $order->id) }}"
                            title="Visualizar pedido {{ $order->id }}"
                            class="text-indigo-500 hover:text-indigo-600 inline-flex items-center justify-center">
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
</section>

@endsection
