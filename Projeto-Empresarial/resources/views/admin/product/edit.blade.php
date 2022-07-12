@extends('layouts.default')
@section('title', 'Editar Produto')

@section('content')

<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/4 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">
                    Editar produto
                </h1>
            </div>

            <form method="POST" enctype="multipart/form-data"
                action="{{ route('admin.product.update', $product->id) }}">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Nome do produto</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('name')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Estoque</label>
                            <input type="text" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('stock')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Preço de custo</label>
                            <input type="text" id="price_cost" name="price_cost"
                                value="{{ old('price_cost', $product->price_cost) }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('price_cost')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Preço de venda</label>
                            <input type="text" id="price_sell" name="price_sell"
                                value="{{ old('price_sell', $product->price_sell) }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('price_sell')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Imagem</label>
                            <input type="file" id="cover" name="cover"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('cover')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @if ($product->cover && !Str::contains($product->cover, 'https://dummyimage.com'))
                    <div class="p-2 w-full flex flex-col items-start">

                        <img src="{{ $product->cover }}" alt="{{ $product->name }}"
                            class="object-cover object-center w-full block" />

                        {{-- <a href="{{ route('admin.product.destroy.image', $product->id) }}"
                        class="my-2 inline-flex items-center bg-red-500 border-0 py-1 px-3 focus:outline-none
                        hover:bg-red-600 rounded text-white">
                        Deletar Imagem
                        </a> --}}
                    </div>
                    @endif

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                            <textarea id="description" name="description" class="
                                w-full min-h-[100px] bg-gray-100 bg-opacity-50 rounded
                                border border-gray-300 focus:border-indigo-500
                                focus:bg-white focus:ring-2 focus:ring-indigo-200
                                text-base outline-none text-gray-700 py-1 px-3
                                transition-colors duration-200 ease-in-out
                                ">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-full">
                        <button type="submit"
                            class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                            Editar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
