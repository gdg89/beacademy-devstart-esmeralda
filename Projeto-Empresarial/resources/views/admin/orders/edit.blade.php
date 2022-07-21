@extends('layouts.default')
@section('title', 'Editar Pedido')

@push('scripts')
@vite(['resources/js/orders/edit.js'])
@endpush

@section('content')

<section class="section-container">
    <h1 class="title mb-4">
        Editar pedido #{{ $order->id }}
    </h1>

    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.orders.update', $order->id) }}">
        @csrf
        @method('PUT')

        <div class="input-container">
            <label for="status" class="form-label">Status do pedido</label>

            <select id="status" name="status" class="select-status sm:w-[200px]">

                @foreach ($order->statusList as $status)
                <option @if ($order->status === $status) selected @endif class="select-option-status">
                    {{ $status }}
                </option>
                @endforeach

            </select>

            @error('status')
            <p class="msg-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-8 w-full mx-auto overflow-auto">
            <h1 class="title mb-4">
                Produtos
            </h1>

            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="table-th">
                            #
                        </th>

                        <th class="table-th">
                            Imagem
                        </th>

                        <th class="table-th text-center">
                            Qtd
                        </th>

                        <th class="table-th">
                            Nome
                        </th>

                        <th class="table-th text-center">
                            Preço (R$)
                        </th>

                        <th class="table-th text-center">
                            TOTAL (R$)
                        </th>

                        <th class="table-th text-center">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @foreach ($order->uniqueProducts as $product)
                    <tr class="even:bg-gray-100 odd:bg-white" id="product-{{ $product->id }}">

                        <input type="checkbox" name="{{ $product->id }}" id="product-checkbox-{{ $product->id }}" hidden
                            value="remove">

                        <td class="px-4 py-3">{{ $product->id }}</td>
                        <td class="px-4 py-3">
                            <img alt="{{ $product->name }}" class="object-cover object-center w-full h-[80px] block"
                                src="{{ $product->cover }}" style="width: 150px; min-width: 150px;" />
                        </td>
                        <td class="text-center px-4 py-3">{{ $product->quantity }}</td>
                        <td class="px-4 py-3">{{ $product->name }}</td>
                        <td class="text-center px-4 py-3">{{ $product->price_sell }}</td>
                        <td class="text-center px-4 py-3">{{ $product->total }}</td>


                        <td class="px-4 py-3 text-sm text-center">

                            <span
                                class="inline-flex items-center justify-center text-emerald-500 hover:text-emerald-600 hover:cursor-pointer"
                                data-id="{{ $product->id }}">


                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>

            @error('products')
            <p class="msg-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-primary mt-4 ml-auto">
            Editar
        </button>
    </form>
</section>

@endsection
