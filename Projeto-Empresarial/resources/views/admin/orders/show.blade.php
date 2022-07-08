@extends('layouts.default')
@section('title', "Pedido #{$order->id}")
@section('content')

<div class="container px-5 pt-16 pb-24 mx-auto w-full">
    <div class="flex items-center mb-2">
        <h1 class="text-2xl font-medium title-font text-gray-900">
            Pedido #{{ $order->id }}
        </h1>
        <div class="ml-4">
            @include('shared.status')
        </div>
    </div>

    <span class="block mb-8 text-sm">
        Criado em {{ $order->created_at->format('d/m/Y - H:i:s') }}
    </span>

    <div class="flex flex-col gap-8 md:flex-row">
        <div class="inline-flex flex-col gap-2 md:w-1/2 p-5 rounded-lg bg-indigo-50 border border-indigo-200">
            <h1 class="mb-2 text-2xl font-medium title-font text-gray-900">
                Dados do cliente
            </h1>

            <p>
                <strong>Nome:</strong>
                <span>{{ $order->user->name }}</span>
            </p>


            <p>
                <strong>Email:</strong>
                <span>{{ $order->user->email }}</span>
            </p>

            <p>
                <strong>Telefone:</strong>
                <span>{{ $order->user->phone }}</span>
            </p>

            <p>
                <strong>Data de nascimento:</strong>
                <span>{{ date('d/m/Y', strtotime($order->user->birthday)) }}</span>
            </p>

            <p>
                <strong>Endereço:</strong>
                <span>{{ $order->user->address }}</span>
            </p>

        </div>

        <div class="inline-flex flex-col gap-2 md:w-1/2 p-5 rounded-lg bg-indigo-50 border border-indigo-200">
            <h1 class="mb-2 text-2xl font-medium title-font text-gray-900">
                Detalhes
            </h1>
            <p>
                <strong class="uppercase">Itens:</strong>
                <span>{{ $order->quantity }}</span>
            </p>

            <p>
                <strong class="uppercase">Total:</strong>
                <span>R$ {{ $order->total }}</span>
            </p>
            <p>
                <strong class="uppercase">Custo:</strong>
                <span>R$ {{ $order->cost }}</span>
            </p>

            <p>
                <strong class="uppercase">Lucro:</strong>
                <span>R$ {{ $order->profit }}</span>
            </p>

        </div>

    </div>


    <div class="mt-12 w-full mx-auto overflow-auto">
        <div class="flex items-center justify-between mb-2">
            <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">
                Produtos
            </h1>

        </div>
        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
                <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        #
                    </th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                        style="width: 150px">
                        Imagem
                    </th>
                    <th
                        class="text-center px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        Qtd
                    </th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        Nome
                    </th>
                    <th
                        class="text-center px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        Custo (R$)
                    </th>

                    <th
                        class="text-center px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        Preço (R$)
                    </th>

                    <th
                        class="text-center px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        CUSTO_TOTAL (R$)
                    </th>

                    <th
                        class="text-center px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        TOTAL (R$)
                    </th>

                    <th
                        class="text-center px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        LUCRO (R$)
                    </th>

                </tr>
            </thead>
            <tbody class="divide-y">

                @foreach ($order->uniqueProducts as $product)
                <tr class="even:bg-gray-100 odd:bg-white">
                    <td class="px-4 py-3">{{ $product->id }}</td>
                    <td class="px-4 py-3">
                        <img alt="{{ $product->name }}" class="object-cover object-center w-full h-[80px] block"
                            src="{{ $product->cover }}" />
                    </td>
                    <td class="text-center px-4 py-3">{{ $product->quantity }}</td>
                    <td class="px-4 py-3">{{ $product->name }}</td>
                    <td class="text-center px-4 py-3">{{ $product->price_cost }}</td>
                    <td class="text-center px-4 py-3">{{ $product->price_sell }}</td>
                    <td class="text-center px-4 py-3">{{ $product->total_cost }}</td>
                    <td class="text-center px-4 py-3">{{ $product->total }}</td>
                    <td class="text-center px-4 py-3">{{ $product->profit }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>

@endsection
