@extends('layouts.secondary')
@section('title', 'Login')

@section('content')
<div
    class="relative grow flex items-center justify-center  bg-[url('https://source.unsplash.com/random')] bg-no-repeat bg-cover bg-center">

    <div class="absolute h-full top-0 right-0 bottom-0 left-0 bg-indigo-500 bg-opacity-30"></div>

    <div class="px-5 py-6 mt-4 text-left bg-white shadow-lg rounded-lg z-10">
        <div class="flex justify-center ">
            <a href="/" class="mb-4 flex title-font items-center font-medium text-indigo-500 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="ml-2 text-xl font-normal text-indigo-500">Voltar para Home</span>
            </a>
        </div>
        <h3 class="text-2xl font-bold text-center">Fazer login</h3>

        <span class="my-4 block">Ainda não tem conta?
            <a href="/cadastro" class="text-indigo-500 hover:underline">
                Cadastre-se
            </a>
        </span>

        <form action="">
            <div class="mt-8">
                <div>
                    <label class="block" for="email">Email<label>
                            <input type="email" placeholder="Email"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            <span class="text-xs tracking-wide text-red-600">Email é obrigatório</span>
                </div>
                <div class="mt-4">
                    <label class="block">Senha<label>
                            <input type="password" placeholder="Senha"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            <span class="text-xs tracking-wide text-red-600">Senha é obrigatória</span>
                </div>
                <div class="flex items-baseline justify-between">
                    <button
                        class="px-6 py-2 mt-4 text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">Login</button>
                    <a href="#" class="text-sm text-indigo-600 hover:underline">Esqueceu a senha?</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
