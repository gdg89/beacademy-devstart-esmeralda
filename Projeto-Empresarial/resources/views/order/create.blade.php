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

    <div class="w-full flex flex-col items-center justify-center">
        <h1 class="title mb-8">Checkout</h1>

        <form method="POST" action="{{ route("order.store") }}"
            class="flex flex-col gap-4 w-full max-w-xl shadow-xl py-8 px-5 rounded-md">
            @csrf

            <input type="hidden" name="transaction_amount" id="transaction_amount">
            <input type="hidden" name="transaction_type" id="transaction_type">

            <div class="input-container w-full">
                <label for="card_holder_name" class="form-label">Nome do títular</label>
                <input type="text" id="card_holder_name" name="card_holder_name" value="{{ old('card_holder_name') }}"
                    class="form-input" placeholder="Nome do títular" required />

                @error('card_holder_name')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-container w-full">
                <label for="card_holder_cpf" class="form-label">CPF do títular</label>
                <input type="text" id="card_holder_cpf" name="card_holder_cpf" value="{{ old('card_holder_cpf') }}"
                    class="form-input" placeholder="xxx.xxx.xxx-xx" required />

                @error('card_holder_cpf')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <select name="transaction_installments" id="transaction_installments" class="select-status">
            </select>

            <div class="input-container w-full">
                <label for="card_number" class="form-label">Número do cartão</label>
                <input type="text" id="card_number" name="card_number" value="{{ old('card_number') }}"
                    class="form-input" placeholder="**** **** **** ****" required />

                @error('card_number')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="card_cvv" class="form-label">CVV</label>
                    <input type="number" min="100" max="999" id="card_cvv" name="card_cvv" value="{{ old('card_cvv') }}"
                        class="form-input" placeholder="***" required />

                    @error('card_cvv')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="card_expiration_date" class="form-label">Data de expiração</label>
                    <input type="text" id="card_expiration_date" name="card_expiration_date"
                        value="{{ old('card_expiration_date') }}" class="form-input" placeholder="mm/yyyy" required />

                    @error('card_expiration_date')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-primary mt-4">
                Confirmar pagamento
            </button>
        </form>

    </div>
</section>

@endsection
