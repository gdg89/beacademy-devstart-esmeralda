@php
$routes = [
'home' => route('home'),
'admin.products.index' => route('admin.products.index'),
'admin.orders.index' => route('admin.orders.index'),
'admin.users.index' => route('admin.users.index'),
];

$dataTypes = [
'home' => 'produto',
'admin.products.index' => 'produto',
'admin.orders.index' => 'cliente',
'admin.users.index' => 'usuário',
];

@endphp

<section class="container mx-auto flex">

    <form method="GET" action="{{ $routes[Route::currentRouteName()] }}" class="w-full flex flex-col md:flex-row gap-4">

        <input type="search" id="search" name="search"
            placeholder="Pesquisar {{ $dataTypes[Route::currentRouteName()] }}" value="{{ request()->search }}" class="
            w-full md:w-1/2 text-gray-700 bg-gray-100 bg-opacity-50 border border-gray-300
            py-1 px-3 leading-8 rounded
            focus:ring-2 focus:bg-transparent focus:ring-emerald-200
            text-base outline-none
            transition-colors duration-200 ease-in-out
        ">

        @if (Route::currentRouteName() === 'admin.orders.index')
        @include('shared.status.select')
        @endif

        <button type="submit" class="btn-primary btn-green"
            title="Pesquisar {{ $dataTypes[Route::currentRouteName()] }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>

        <a href="@if (request()->search || request()->status) {{ $routes[Route::currentRouteName()] }} @else # @endif"
            class="btn-primary btn-green" title="Limpar">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>

    </form>
</section>
