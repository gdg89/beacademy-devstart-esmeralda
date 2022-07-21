@extends('layouts.default')
@section('title', $product->name)
@section('content')
<section class="text-gray-600 overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="{{ $product->name }}" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                src="{{ $product->cover }}" />
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
                    {{ $product->name }}
                </h1>
                <p class="leading-relaxed">
                    {{ $product->description }}
                </p>
                <div class="my-3">
                    @if ($product->stock > 0)
                    <span class="
                        inline-flex items-center px-3 py-0.5
                        rounded-full text-sm
                        font-medium bg-emerald-100 text-emerald-800
                    ">
                        {{ $product->stock }} em estoque
                    </span>
                    @else
                    <span class="
                        inline-flex items-center px-3 py-0.5
                        rounded-full text-sm
                        font-medium bg-red-100 text-red-800
                    ">
                        Fora de estoque
                    </span>
                    @endif
                </div>
                <div class="flex border-t-2 border-gray-100 mt-6 pt-6">
                    <span class="title-font font-medium text-2xl text-gray-900">
                        R${{ $product->price_sell }}
                    </span>

                    @php
                    $btnStyles = $product->stock > 0 ?
                    "bg-emerald-500 hover:bg-emerald-600 cursor-pointer" :
                    "bg-gray-500 hover:bg-gray-600 cursor-not-allowed";
                    @endphp

                    <a class="
                        disabled flex ml-auto border-0 rounded
                        text-white py-2 px-6 focus:outline-none
                        {{ $btnStyles }}
                    ">
                        Comprar
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
