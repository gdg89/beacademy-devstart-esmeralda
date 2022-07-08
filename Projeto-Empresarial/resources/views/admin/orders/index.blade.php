@extends('layouts.default')
@section('title', 'Admin Pedidos')
@section('content')

<section class="text-gray-600 py-16">

    {{-- @include('shared.search') --}}

    <div class="container px-5 py-2 mx-auto w-full">
        {{ $orders->links() }}
    </div>

    <div class="container px-5 pt-8 pb-24 mx-auto w-full">


        <div class="w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">
                    Pedidos
                </h1>
                <a href="#" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none
                hover:bg-indigo-600 rounded">
                    Adicionar
                </a>
            </div>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            #
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Qtd
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Total (R$)
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Custo (R$)
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Lucro (R$)
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Email do Cliente
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Status
                        </th>
                        <th
                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @foreach ($orders as $order)
                    <tr class="even:bg-gray-100 odd:bg-white">
                        <td class="px-4 py-3">{{ $order->id }}</td>
                        <td class="px-4 py-3">{{ $order->quantity }}</td>
                        <td class="px-4 py-3">{{ $order->total }}</td>
                        <td class="px-4 py-3">{{ $order->cost }}</td>
                        <td class="px-4 py-3">{{ $order->profit }}</td>
                        <td class="px-4 py-3">{{ $order->user->email }}</td>
                        <td class="px-4 py-3 h-full">
                            @include('shared.status')
                        </td>
                        <td class="px-4 py-3 text-sm text-right space-x-3">
                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                class="text-indigo-500 inline-flex items-center">
                                Visualizar
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
