@extends('layouts.default')
@section('title', 'Checkout')

@php
$user = Auth::user();
@endphp


@push('scripts')
<script type="text/javascript">
    const route = @json(Route::currentRouteName())
</script>

@vite(['resources/js/cart/checkout.js'])
@endpush

@section('content')

<section class="section-container">
    <div class="w-full flex flex-col items-center justify-start">
        <h1 class="title mb-8">Checkout</h1>

        <div class="flex flex-col sm:flex-row items-center gap-8 w-full sm:max-w-[400px] mb-8">
            <a href="{{ route('order.create.card') }}" id="card-btn" class="btn-primary w-full sm:w-1/2">Cartão de
                crédito</a>

            <a href="{{ route('order.create.ticket') }}" id="ticket-btn" class="btn-primary w-full sm:w-1/2">Boleto</a>
        </div>

        @if (Route::currentRouteName() === "order.create.card")
        @include('order.card-form')
        @endif

        @if (Route::currentRouteName() === "order.create.ticket")
        @include('order.ticket-form')
        @endif
    </div>

    @include('order.cart-table')

</section>

@endsection
