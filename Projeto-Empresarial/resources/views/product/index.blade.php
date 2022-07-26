@extends('layouts.default')
@section('title', 'Home')
@section('content')

@if (session()->has('login'))
@include('shared.notifications.success', ['message' => session('login')])
@endif

@if (session()->has('logout'))
@include('shared.notifications.success', ['message' => session('logout')])
@endif

<section class="section-container">

    @include('shared.search')
    @if(Session::has('alert'))
    {!! Session::get('alert') !!}
    @endif
    <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-5 gap-y-8 my-12">
        @if($products->isEmpty())
        @include('shared.empty-result', ['message' => 'Nenhum produto encontrado 🥲'])
        @else

        @foreach ($products as $product)
        <div
            class="flex flex-col justify-between rounded-md shadow-md shadow-zinc-200 hover:shadow-zinc-400 transition duration-300 ease-in-out">

            <div>
                <a class=" block relative" href="{{ route('product.show', $product->slug) }}">
                    <img alt="{{ $product->name }}"
                        class="h-48 rounded-t-md overflow-hidden object-cover object-center w-full "
                        src="{{ $product->cover }}" />

                    @include('product.stock')
                </a>

                <div class="mx-4 mt-4">
                    <a href="{{ route('product.show', $product->slug) }}">
                        <h2 class="text-gray-900 title-font text-lg font-normal hover:text-emerald-500">
                            {{ $product->name }}
                        </h2>
                    </a>

                    <strong class="block mt-2 text-lg">R$ {{ $product->price_sell }}</strong>
                </div>
            </div>

            <div class="m-4">
                <button data-product="{{ $product }}"
                    class="add-to-cart-button btn-primary w-full @if($product->stock <= 0) bg-gray-500 hover:bg-gray-600 cursor-not-allowed disabled @endif">
                    Adicionar ao carrinho
                </button>
            </div>

        </div>
        @endforeach

        @endif
    </div>


    <div class="pt-16 pb-12">
        {{ $products->links() }}
    </div>

</section>

@endsection
