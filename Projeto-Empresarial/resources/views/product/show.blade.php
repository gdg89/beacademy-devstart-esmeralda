@extends('layouts.default')
@section('title', $product->name)

@push('scripts')

<script type="text/javascript">
    const product = @json($product)
</script>

@vite(['resources/js/cart/add.js'])
@endpush

@section('content')
<section class="section-container">
    <div class="mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">

            <div class="relative lg:w-1/2 w-full lg:h-auto h-64">
                <img alt="{{ $product->name }}" class="w-full h-full object-cover object-center rounded"
                    src="{{ $product->cover }}" />

                @include('product.stock')
            </div>


            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
                    {{ $product->name }}
                </h1>

                <p class="leading-relaxed">
                    {{ $product->description }}
                </p>


                <div class="flex border-t-2 border-gray-100 mt-6 pt-6">
                    <span class="title-font font-medium text-2xl text-gray-900">
                        R$ {{ $product->price_sell }}
                    </span>

                    @php
                    $btnStyles = $product->stock > 0 ?
                    "bg-emerald-400 hover:bg-emerald-600 cursor-pointer" :
                    "bg-gray-500 hover:bg-gray-600 cursor-not-allowed disabled";
                    @endphp

                    <button id="add-to-cart-button" class="btn-primary ml-auto {{ $btnStyles }}">
                        Comprar
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
