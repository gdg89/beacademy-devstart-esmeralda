@extends('layouts.default')
@section('title', 'Editar Produto')

@section('content')

<section class="section-container">
    <div class="form-container">
        <h1 class="title">
            Editar produto
        </h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.products.update', $product->id) }}"
            class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <div class="w-full flex flex-col sm:flex-row gap-2 sm:gap-4">
                <div class="input-container sm:w-1/2">
                    <label for="name" class="form-label">Nome do produto</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                        class="form-input" />

                    @error('name')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror

                </div>

                <div class="input-container sm:w-1/2">
                    <label for="stock" class="form-label">Estoque</label>
                    <input type="text" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                        class="form-input" />

                    @error('stock')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="w-full flex flex-col sm:flex-row gap-2 sm:gap-4">
                <div class="input-container sm:w-1/2">
                    <label for="price_cost" class="leading-7 text-sm text-gray-600">Preço de custo</label>
                    <input type="text" id="price_cost" name="price_cost"
                        value="{{ old('price_cost', $product->price_cost) }}" class="form-input" />

                    @error('price_cost')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror

                </div>

                <div class="input-container sm:w-1/2">
                    <label for="price_sell" class="leading-7 text-sm text-gray-600">Preço de venda</label>
                    <input type="text" id="price_sell" name="price_sell"
                        value="{{ old('price_sell', $product->price_sell) }}" class="form-input" />

                    @error('price_sell')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="input-container">
                <label for="cover" class="form-label">Imagem</label>
                <input type="file" id="cover" name="cover" class="form-input" />

                @error('cover')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <img src="{{ $product->cover }}" alt="{{ $product->name }}"
                class="w-full py-2 object-cover object-center block" />

            <div class="input-container">
                <label for="description" class="leading-7 text-sm text-gray-600">Descrição</label>
                <textarea id="description" name="description"
                    class="form-textarea">{{ old('description', $product->description) }}</textarea>
                @error('description')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary ml-auto mt-4">
                Editar
            </button>

        </form>
    </div>
</section>

@endsection
