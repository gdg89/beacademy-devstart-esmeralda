@extends('layouts.default')
@section('title', 'Checkout')


@push('scripts')
@vite(['resources/js/cart/checkout.js'])
@endpush

@section('content')

<section class="section-container">
    <h2 class="title mb-8">Carrinho</h2>

    <div class="w-full mx-auto overflow-auto mb-8">
        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
                <tr>
                    <th class="table-th">
                        Imagem
                    </th>
                    <th class="table-th text-center">
                        Nome
                    </th>
                    <th class="table-th text-center">
                        Quantidade
                    </th>
                    <th class="table-th text-center">
                        Preço
                    </th>
                    <th class="table-th text-center">
                        Subtotal
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y" id="checkout-cart-tbody"></tbody>
        </table>
    </div>

    <h3 id="cart-total" class="title mb-8">Total: </h3>

    <h1 class="title">Checkout</h1>



</section>

@endsection
