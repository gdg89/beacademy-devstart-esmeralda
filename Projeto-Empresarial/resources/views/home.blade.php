@extends('layouts.default')
@section('title', 'Home')
@section('content')


<section class="text-gray-600 py-16">

    @include('shared.search')

    <div class="container px-5 mx-auto">
        <div class="flex flex-wrap -m-4">
            @if($products->isEmpty())

            <div class="p-4 w-full">
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
                    Nenhum produto encontrado 🥲
                </h1>
            </div>

            @else
            @foreach ($products as $product)
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a class="block relative h-48 rounded overflow-hidden">
                    <img alt="{{ $product->name }}" class="object-cover object-center w-full h-full block"
                        src="{{ $product->cover }}" />
                </a>
                <div class="mt-4">
                    <h2 class="text-gray-900 title-font text-lg font-medium">
                        {{ $product->name }}
                    </h2>
                    <p class="mt-1">R${{ $product->price_sell }}</p>
                </div>
                <a href="{{ route('product.show', $product->id) }}"
                    class="mt-3 text-indigo-500 inline-flex items-center">Ver
                    mais
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            @endforeach
            @endif
        </div>

    </div>

    <div class="container px-5 py-20 mx-auto w-full">
        {{ $products->links() }}
    </div>

</section>

@endsection
