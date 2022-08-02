<form id="checkout-ticket-form" method="POST" action="{{ route("order.store.ticket") }}"
    class="flex flex-col gap-4 w-full max-w-xl shadow-xl py-8 px-5 rounded-md ease-in-out duration-500 sm:duration-700 transform transition">
    @csrf

    <input type="hidden" name="transaction_amount" id="transaction_amount">
    <input type="hidden" name="transaction_type" id="transaction_type">
    <input type="hidden" name="customer_name" id="customer_name" value="{{ $user->name }}">
    <input type="hidden" name="customer_document" id="customer_name" value="{{ $user->cpf }}">
    <input type="hidden" name="customer_postcode" id="customer_name" value="{{ $user->cep }}">
    <input type="hidden" name="customer_address_street" id="customer_name" value="{{ $user->street }}">
    <input type="hidden" name="customer_andress_number" id="customer_name" value="{{ $user->number }}">
    <input type="hidden" name="customer_address_neighborhood" id="customer_name" value="{{ $user->district }}">
    <input type="hidden" name="customer_address_city" id="customer_name" value="{{ $user->city }}">
    <input type="hidden" name="customer_address_state" id="customer_name" value="{{ $user->state }}">
    <input type="hidden" name="customer_address_country" id="customer_name" value="Brasil">

    <h2 class="title">Dados do pagador</h2>

    @if ($errors->any())

    <div class="msg-error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif

    <select name="transaction_installments" id="transaction_installments" class="select-status">
    </select>

    <ul>
        <li class="pb-4">
            <strong>Nome:</strong> {{ $user->name }}
        </li>
        <li class="pb-4">
            <strong>CPF:</strong> {{ $user->cpf }}
        </li>
        <li class="pb-4">
            <strong>País:</strong> Brasil
        </li>
        <li class="pb-4">
            <strong>CEP:</strong> {{ $user->cep }}
        </li>
        <li class="pb-4">
            <strong>Estado:</strong> {{ $user->state }}
        </li>
        <li class="pb-4">
            <strong>Cidade:</strong> {{ $user->city }}
        </li>
        <li class="pb-4">
            <strong>Rua:</strong> {{ $user->street }}
        </li>
        <li class="pb-4">
            <strong>Número:</strong> {{ $user->number }}
        </li>
        <li class="pb-4">
            <strong>Bairro:</strong> {{ $user->district }}
        </li>
    </ul>



    <button type="submit" class="btn-primary mt-4">
        Confirmar pagamento
    </button>
</form>
