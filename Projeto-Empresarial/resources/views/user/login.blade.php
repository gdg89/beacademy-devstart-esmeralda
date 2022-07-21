@extends('layouts.secondary')
@section('title', 'Login')

@section('content')
<div
    class="h-screen w-screen grow flex flex-col items-center justify-center bg-gradient-to-r from-cyan-300 to-emerald-300">

    <div class="px-5 py-6 mt-4 bg-white shadow-lg rounded-lg z-10">
        <div class="flex flex-col gap-4">



            <h3 class="text-2xl font-bold">Fazer login</h3>

            <span class="">Ainda não tem conta?
                <a href="/cadastro" class="text-emerald-500 hover:underline">
                    Cadastre-se
                </a>
            </span>
        </div>

        <form action="">
            <div class="mt-4">
                <div>
                    <label class="block" for="email">Email<label>
                            <input type="email" placeholder="Email"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            <span class="msg-error">Email é obrigatório</span>
                </div>
                <div class="mt-4">
                    <label class="block">Senha<label>
                            <input type="password" placeholder="Senha"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            <span class="msg-error">Senha é obrigatória</span>
                </div>
                <button class="btn-primary mt-4 w-full">
                    Login
                </button>
            </div>
        </form>
    </div>

    <a href="/" class="mt-8 flex justify-center items-center text-emerald-500 hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-emerald-800" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
        <span class="pl-2 text-xl font-normal text-emerald-800">Voltar para Home</span>
    </a>
</div>
@endsection
