<a href="/login" class="header-nav-link">
    Entrar
</a>

<a href="/admin/produtos" class="header-nav-link">
    Admin
</a>

@php
$user =  Auth::user();
$user->avatar = App\Models\User::getUserAvatarPath($user);
@endphp


<button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="avatar w-12 h-12 flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
    <span class="sr-only">Open user menu</span>
    <img class="w-8 h-8 rounded-full" src="{{$user->avatar}}" alt="user photo">
</button>

<!-- Dropdown menu -->
<div id="dropdownAvatar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
      <div>{{$user->name}}</div>
    </div>
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
      <li>
        <a href="/usuario/{{ $user->id }}" title="{{ $user->name }}"
            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editar
        </a>
      </li>
    </ul>
    <div class="py-1">
      <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
    </div>
</div>