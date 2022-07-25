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
    Produtos
</a>
<a href="/admin/pedidos" class="header-nav-link">
    Pedidos
</a>
<a href="/admin/usuarios" class="header-nav-link">
    Usuários
</a>

<button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="avatar w-12 h-12 flex
    mx-3 text-sm bg-emerald-500 rounded-full md:mr-0 focus:ring-2 focus:ring-emerald-200 " type="button">
    <span class="sr-only">Open user menu</span>
    <img class="w-8 h-8 rounded-full" src="{{ App\Models\User::getUserAvatarPath($user) }}" alt="{{ $user->name }}">
</button>

<!-- Dropdown menu -->
<div id="dropdownAvatar" class="hidden z-10 w-44 bg-white rounded  shadow">

    <div class="py-3 px-4 text-sm text-emerald-500 ">
        <div>{{ $user->name }}</div>
    </div>

    <ul class="py-1 text-sm text-gray-500 hover:bg-emerald-100" aria-labelledby="dropdownUserAvatarButton">
        <li>
            <a href="/usuario/{{ $user->id }}" title="{{ $user->name }}" class="block py-2 px-4  ">
                Editar
            </a>
        </li>
    </ul>

    <div class="py-1 text-gray-500 hover:bg-emerald-100">
        <a href="{{route('logoff')}}" class="block py-2 px-4 text-sm  ">
            Logout
        </a>
    </div>
</div>
