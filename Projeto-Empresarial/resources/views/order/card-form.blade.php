@if (session()->has('error'))
@include('shared.notifications.error', ['message' => session('error')])
@endif

<form id="checkout-form" method="POST" action="{{ route("order.store.card") }}"
    class="flex flex-col gap-4 w-full max-w-xl shadow-xl py-8 px-5 rounded-md ease-in-out duration-500 sm:duration-700 transform transition">
    @csrf

    <input type="hidden" name="transaction_amount" id="transaction_amount">
    <input type="hidden" name="transaction_type" id="transaction_type">

    <div class="input-container w-full">
        <label for="customer_name" class="form-label">Nome do títular</label>
        <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" class="form-input"
            placeholder="Nome do títular" required />

        @error('customer_name')
        <p class="msg-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="input-container w-full">
        <label for="customer_document" class="form-label">CPF do títular</label>
        <input type="text" id="customer_document" name="customer_document" value="{{ old('customer_document') }}"
            class="form-input" placeholder="xxx.xxx.xxx-xx" required />

        @error('customer_document')
        <p class="msg-error">{{ $message }}</p>
        @enderror
    </div>

    <select name="transaction_installments" id="transaction_installments" class="select-status">
    </select>

    <div class="input-container w-full">
        <label for="customer_card_number" class="form-label">Número do cartão</label>
        <input type="text" id="customer_card_number" name="customer_card_number"
            value="{{ old('customer_card_number') }}" class="form-input" placeholder="**** **** **** ****" required />

        @error('customer_card_number')
        <p class="msg-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="input-group">
        <div class="input-container sm:w-1/2">
            <label for="customer_card_cvv" class="form-label">CVV</label>
            <input type="number" min="100" max="999" id="customer_card_cvv" name="customer_card_cvv"
                value="{{ old('customer_card_cvv') }}" class="form-input" placeholder="***" required />

            @error('customer_card_cvv')
            <p class="msg-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-container sm:w-1/2">
            <label for="card_expiration_date" class="form-label">Data de expiração</label>
            <input type="text" id="customer_card_expiration_date" name="customer_card_expiration_date"
                value="{{ old('customer_card_expiration_date') }}" class="form-input" placeholder="mm/yyyy" required />

            @error('customer_card_expiration_date')
            <p class="msg-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn-primary mt-4">
        Confirmar pagamento
    </button>
</form>
