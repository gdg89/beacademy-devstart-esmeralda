@extends('layouts.default')
@section('title', 'Home')
@section('content')


<section class="section-container">

    @include('shared.search')

    <div class="flex flex-wrap my-12 w-full">
        @if($products->isEmpty())
        @include('shared.empty-result', ['message' => 'Nenhum produto encontrado 🥲'])
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
                class="mt-3 text-emerald-500 inline-flex items-center">Ver
                mais
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        @endforeach

        @endif
    </div>


    <div class="pt-16 pb-12">
        {{ $products->links() }}
    </div>

</section>

@endsection
