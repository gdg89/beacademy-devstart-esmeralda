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

    <ul>
        <li>
            <strong>Nome:</strong> {{ $user->name }}
        </li>
        <li>
            <strong>CPF:</strong> {{ $user->cpf }}
        </li>
        <li>
            <strong>País:</strong> Brasil
        </li>
        <li>
            <strong>Rua:</strong> {{ $user->street }}
        </li>
        <li>
            <strong>Número:</strong> {{ $user->number }}
        </li>
        <li>
            <strong>Bairro:</strong> {{ $user->district }}
        </li>
        <li>
            <strong>Cidade:</strong> {{ $user->city }}
        </li>
        <li>
            <strong>Estado:</strong> {{ $user->state }}
        </li>

    </ul>



    <button type="submit" class="btn-primary mt-4">
        Confirmar pagamento
    </button>
</form>
