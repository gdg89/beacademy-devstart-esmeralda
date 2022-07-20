@extends('layouts.default')
@section('title', 'Cadastro de usuario')

@section('content')
<section class="section-container">
    <div class="form-container">
        <h1 class="title">Cadastre-se</h1>

        <form class="flex flex-col gap-4" method="POST" action="{{ route("user.store") }}">
            @csrf

            <div class="input-container">
                <label for="name" class="form-label">Nome</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-input" />

                @error('name')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-container">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-input" />

                @error('email')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-container">
                <label for="password" class="form-label">Senha</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-input" />

                @error('password')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>


            <div class="w-full flex flex-col sm:flex-row gap-2 sm:gap-4">
                <div class="input-container sm:w-1/2">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" class="form-input" />

                    @error('cpf')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-input" />

                    @error('phone')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="w-full flex flex-col sm:flex-row gap-2 sm:gap-4">
                <div class="input-container sm:w-1/2">
                    <label for="birthday" class="form-label">Data de nascimento</label>
                    <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}" class="form-input" />

                    @error('birthday')
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
                <input type="text" id="street" name="street" value="{{ old('street') }}" class="form-input" />

                @error('street')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full flex flex-col sm:flex-row gap-2 sm:gap-4">
                <div class="input-container sm:w-1/2">
                    <label for="city" class="form-label">Cidade</label>
                    <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-input" />

                    @error('city')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="neighbor" class="form-label">Bairro</label>
                    <input type="text" id="neighbor" name="neighbor" value="{{ old('neighbor') }}" class="form-input" />

                    @error('neighbor')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="w-full flex flex-col sm:flex-row gap-2 sm:gap-4">
                <div class="input-container sm:w-1/2">
                    <label for="number" class="form-label">Número</label>
                    <input type="text" id="number" name="number" value="{{ old('number') }}" class="form-input" />

                    @error('number')
                    <p class="msg-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-container sm:w-1/2">
                    <label for="complement" class="form-label">Complemento</label>
                    <input type="text" id="complement" name="complement" value="{{ old('complement') }}"
                        class="form-input" />

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
