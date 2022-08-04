@extends('layouts.default')
@section('title', 'Checkout')

@php
$user = Auth::user();

$isCardForm = Route::currentRouteName() === 'order.create.card';
@endphp


@push('scripts')
<script type="text/javascript">
    const route = @json(Route::currentRouteName())
</script>

@vite(['resources/js/cart/checkout.js'])
@endpush

@section('content')

<section class="section-container">

    @include('order.cart-table')

    <div class="w-full flex flex-col items-center justify-start">
        <h1 class="title mb-8">Checkout</h1>

        <div class="flex flex-col sm:flex-row items-center gap-8 w-full sm:max-w-[400px] mb-8">
            <a href="{{ route('order.create.card') }}#checkout-form" id="card-btn"
                class="w-full sm:w-1/2 @if($isCardForm) btn-primary @else btn-outline @endif">
                Cartão de crédito
            </a>

            <a href="{{ route('order.create.ticket') }}#checkout-form" id="ticket-btn"
                class=" w-full sm:w-1/2 @if($isCardForm) btn-outline @else btn-primary @endif">
                Boleto
            </a>
        </div>

        @if (Route::currentRouteName() === "order.create.card")
        @include('order.card-form')
        @endif

        @if (Route::currentRouteName() === "order.create.ticket")
        @include('order.ticket-form')
        @endif
    </div>

</section>

@endsection
