@extends('layouts.default')
@section('title', 'Adicionar Produto')

@section('content')

<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/4 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">
                    Adicionar produto
                </h1>
            </div>

            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.products.store') }}">
                @csrf
                <div class="flex flex-wrap">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Nome do produto</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('name')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Estoque</label>
                            <input type="text" id="stock" name="stock" value="{{ old('stock') }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('stock')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Preço de custo</label>
                            <input type="text" id="price_sell" name="price_sell" value="{{ old('price_sell') }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('price_sell')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Preço de venda</label>
                            <input type="text" id="price_cost" name="price_cost" value="{{ old('price_cost') }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('price_cost')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Imagem</label>
                            <input type="file" id="cover" name="cover" alue="{{ old('cover') }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            @error('cover')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                            <textarea id="description" name="description" class="
                                w-full min-h-[100px] bg-gray-100 bg-opacity-50 rounded
                                border border-gray-300 focus:border-indigo-500
                                focus:bg-white focus:ring-2 focus:ring-indigo-200
                                text-base outline-none text-gray-700 py-1 px-3
                                transition-colors duration-200 ease-in-out
                                ">{{ old('description') }}</textarea>
                            @error('description')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-full">
                        <button type="submit"
                            class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                            Adicionar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
