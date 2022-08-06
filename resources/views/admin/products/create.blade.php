@extends('layouts.default')
@section('title', 'Adicionar Produto')

@section('content')

<section class="section-container">
    <div class="form-container">
        <h1 class="title mb-8">
            Adicionar produto
        </h1>

        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.products.store') }}"
            class="flex flex-col gap-4">
            @csrf

            <div class="input-group">

                <div class="input-container sm:w-1/2">
                    <label for="name" class="form-label">Nome do produto</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-input" />

                    @error('name')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="stock" class="form-label">Estoque</label>
                    <input type="text" id="stock" name="stock" value="{{ old('stock') }}" class="form-input" />

                    @error('stock')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="input-group">

                <div class="input-container sm:w-1/2">
                    <label for="price_sell" class="form-label">Preço de custo</label>
                    <input type="text" id="price_sell" name="price_sell" value="{{ old('price_sell') }}"
                        class="form-input" />

                    @error('price_sell')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="price_cost" class="form-label">Preço de venda</label>
                    <input type="text" id="price_cost" name="price_cost" value="{{ old('price_cost') }}"
                        class="form-input" />

                    @error('price_cost')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="input-container">
                <label for="cover" class="form-label">Imagem</label>
                <input type="file" id="cover" name="cover" value="{{ old('cover') }}" class="form-input" />

                @error('cover')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-container">
                <label for="description" class="form-label">Descrição</label>
                <textarea id="description" name="description" class="form-textarea">{{ old('description') }}</textarea>

                @error('description')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary ml-auto mt-4">
                Adicionar
            </button>
        </form>
    </div>
</section>

@endsection
