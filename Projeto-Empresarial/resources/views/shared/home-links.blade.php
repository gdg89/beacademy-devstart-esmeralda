@php
$user = Auth::user();
@endphp

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
@endpush

<a href="/admin/produtos" class="header-nav-link">
    Admin
</a>

@if(Route::currentRouteName() === 'home' || Route::currentRouteName() === 'product.show' )

@push('scripts')
@vite(['resources/js/cart/sidebar.js'])
@endpush

<button type="button" id="cart-button"
    class="relative p-2 rounded-full bg-white text-emerald-500 hover:bg-emerald-500 hover:text-white transition-colors duration-200 ease-in-out">
    <svg class="w-6 h-6 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
        </path>
    </svg>
    <span id="cart-count"
        class="hidden w-5 h-5 absolute -right-1 -bottom-1 flex items-center justify-center bg-indigo-500 text-white text-xs rounded-full"></span>
</button>
@endif


@if ($user)

@php
$user->avatar = App\Models\User::getUserAvatarPath($user);
@endphp

<button type="button" id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
    class="avatar w-10 h-10 flex md:mr-0 text-sm bg-emerald-500 rounded-full focus:ring-2 focus:ring-emerald-200">
    <span class="sr-only">Open user menu</span>
    <img class="w-8 h-8 rounded-full" src="{{ $user->avatar }}" alt="{{ $user->name }}">
</button>

<!-- Dropdown menu -->
<div id="dropdownAvatar" class="hidden z-10 w-44 bg-white rounded  shadow">

    <div class="py-3 px-4 text-sm text-emerald-500 ">
        <div>{{ $user->name }}</div>
    </div>

    <ul class="py-1 text-sm text-gray-500 hover:bg-emerald-100" aria-labelledby="dropdownUserAvatarButton">
        <li>
            <a href="{{ route('user.show', $user->id) }}" title="{{ $user->name }}" class="block py-2 px-4  ">
                Editar
            </a>
        </li>
    </ul>

    <div class="py-1 text-gray-500 hover:bg-emerald-100">
        <a href="#" class="block py-2 px-4 text-sm  ">
            Logout
        </a>
    </div>
</div>

@else

<a href="/login" class="header-nav-link">
    Entrar
</a>

@endif
