@extends('layouts.default')
@section('title', 'Cadastro de usuario')

@php
$title = Route::currentRouteName() === 'admin.users.create' ? 'Cadastrar Usuário' : 'Cadastre-se';
@endphp

@section('content')

@if (session()->has('create'))
<div class="absolute top-0 max-w-md bg-emerald-300 opacity-75 flex items-center justify-center">
    <div class="text-center text-gray-700 text-2xl">
        <p>{{ session('create') }}</p>
    </div>
</div>
@endif

<section class="section-container">
    <div class="form-container">
        <h1 class="title mb-8">
            {{ $title }}
        </h1>

        <form class="flex flex-col gap-4" method="POST" enctype="multipart/form-data"
            action="{{ route("user.store", ["origin" => Route::currentRouteName()]) }}">
            @csrf

            <div class="input-container">
                <label for="avatar" class="form-label">Imagem de Perfil</label>
                <input type="file" id="avatar" name="avatar" value="{{ old('avatar') }}" class="form-input" />

                @error('avatar')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-container">
                <label for="name" class="form-label">Nome</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-input" required
                    placeholder="Nome" />

                @error('name')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-container">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-input" required
                    placeholder="Email" />

                @error('email')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}"
                        class="form-input" required placeholder="Senha" />

                    @error('password')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" class="form-input" required
                        placeholder="xxxxxxxxx" />

                    @error('cpf')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-input" required
                        placeholder="(xx) xxxxx-xxxx" />

                    @error('phone')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="birthday" class="form-label">Data de nascimento</label>
                    <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}" class="form-input" />

                    @error('birthday')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" id="cep" name="cep" value="{{ old('cep') }}" class="form-input"
                        placeholder="xxxxx-xxx" />

                    @error('cep')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>


                <div class="input-container sm:w-1/2">
                    <label for="state" class="form-label">Estado</label>
                    <select name="state" class="select-status" id="state">
                        @foreach ($states as $key => $state)
                        <option value="{{$state}}" class="select-option-status">{{$key}}</option>
                        @endforeach
                    </select>

                    @error('state')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="input-container">
                <label for="street" class="form-label">Endereço</label>
                <input type="text" id="street" name="street" value="{{ old('street') }}" class="form-input"
                    placeholder="Endereço" />

                @error('street')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="city" class="form-label">Cidade</label>
                    <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-input"
                        placeholder="Cidade" />

                    @error('city')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="district" class="form-label">Bairro</label>
                    <input type="text" id="district" name="district" value="{{ old('district') }}" class="form-input"
                        placeholder="Bairro" />

                    @error('district')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="number" class="form-label">Número</label>
                    <input type="text" id="number" name="number" value="{{ old('number') }}" class="form-input"
                        placeholder="Número" />

                    @error('number')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="complement" class="form-label">Complemento</label>
                    <input type="text" id="complement" name="complement" value="{{ old('complement') }}"
                        class="form-input" placeholder="Complemento" />

                    @error('complement')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-primary mt-4">
                Cadastrar
            </button>

        </form>
    </div>
</section>
@endsection
