@extends('layouts.default')
@section('title', 'Editar usuario')

@php
$title = Route::currentRouteName() === 'admin.users.edit' ? 'Editar Usuário' : 'Editar perfil';
@endphp

@section('content')


<section class="section-container">
    <div class="form-container">
        <h1 class="title mb-4">
            {{ $title }}
        </h1>

        <form class="flex flex-col gap-4" method="POST" enctype="multipart/form-data"
            action="{{ route("user.update", ["user" => $user, "id" => $user->id, "origin" => Route::currentRouteName()]) }}">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-center">
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-60 h-60 py-2 avatar" />
            </div>

            <div class="input-container">
                <label for="avatar" class="form-label">Imagem de Perfil</label>
                <input type="file" id="avatar" name="avatar" value="{{ old('avatar', $user->avatar) }}"
                    class="form-input" />

                @error('avatar')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-container">
                <label for="name" class="form-label">Nome</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $user->name) }}" />

                @error('name')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-container">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                    class="form-input" />

                @error('email')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}"
                        class="form-input" />

                    @error('password')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" name="cpf" value="{{ old('cpf', $user->cpf) }}" class="form-input" />

                    @error('cpf')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="birthday" class="form-label">Data de nascimento</label>
                    <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}"
                        class="form-input" />

                    @error('birthday')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                        class="form-input" />

                    @error('phone')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="input-group">

                <div class="input-container sm:w-1/2">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" id="cep" name="cep" value="{{ old('cep', $user->cep) }}" class="form-input"
                        placeholder="xxxxx-xxx" />

                    @error('cep')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>


                <div class="input-container sm:w-1/2">
                    <label for="state" class="form-label">Estado</label>

                    <select name="state" class="select-status" id="state">
                        @foreach ($states as $key => $state)
                        <option @if ($user->state === $state) selected @endif class="select-option-status"
                            value="{{ old('state', $state) }}">
                            {{$key}}
                        </option>
                        @endforeach
                    </select>

                    @error('state')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="input-container">
                <label for="street" class="form-label">Endereço</label>
                <input type="text" id="street" name="street" value="{{ old('street', $user->street) }}"
                    class="form-input" />

                @error('street')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="city" class="form-label">Cidade</label>
                    <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}"
                        class="form-input" />

                    @error('city')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="district" class="form-label">Bairro</label>
                    <input type="text" id="district" name="district" value="{{ old('district', $user->district) }}"
                        class="form-input" />

                    @error('district')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="input-group">
                <div class="input-container sm:w-1/2">
                    <label for="number" class="form-label">Número</label>
                    <input type="text" id="number" name="number" value="{{ old('number', $user->number) }}"
                        class="form-input" />

                    @error('number')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="complement" class="form-label">Complemento</label>
                    <input type="text" id="complement" name="complement"
                        value="{{ old('complement', $user->complement) }}" class="form-input" />

                    @error('complement')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-primary mt-4">
                Editar
            </button>

        </form>
    </div>
</section>
@endsection
