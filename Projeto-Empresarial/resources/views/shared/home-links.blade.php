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

<a href="/usuario/{{ $user->id }}" title="{{ $user->name }}"
    class="border-2 border-emerald-200 hover:border-white rounded-full">
    <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="avatar w-12 h-12">
</a>
