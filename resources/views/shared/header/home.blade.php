@php
$user = Auth::user();

$cartPaths = [
'home',
'product.show'
];
@endphp

@if (isset($user->isAdmin) && $user->isAdmin)
<a href="/admin/produtos" class="header-nav-link">
    Admin
</a>
@endif

@if(in_array(Route::currentRouteName(), $cartPaths))
@include('shared.header.cartButton')
@endif

@if ($user)

@include('shared.header.avatar')

@else

<a href="/login" class="header-nav-link">
    Entrar
</a>

@endif
