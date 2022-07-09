@php
$routes = [
'home' => route('home'),
'admin.products.index' => route('admin.products.index'),
'admin.orders.index' => route('admin.orders.index'),
];

$dataType = Route::currentRouteName() === 'admin.orders.index' ? 'cliente' : 'produto';
@endphp

<section class="container mx-auto flex">

    <form method="GET" action="{{ $routes[Route::currentRouteName()] }}" class="w-full flex gap-4">

        <div class="relative w-full md:w-1/3">
            <input placeholder="Pesquisar {{ $dataType }}" type="search" id="search" name="search"
                value="{{ request()->search }}" class="
                    w-full bg-gray-200 bg-opacity-50 rounded
                    py-1 px-3 leading-8
                    focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200
                    text-base outline-none text-gray-700
                    transition-colors duration-200 ease-in-out
                " />

            @if (request()->search)

            <div class="absolute inset-y-0 right-0 flex items-center px-2">
                <a href="{{ $routes[Route::currentRouteName()] }}">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </a>
            </div>

            @endif

        </div>

        <button type="submit" class="btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>

    </form>
</section>
