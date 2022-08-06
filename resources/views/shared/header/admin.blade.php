@php
$user = Auth::user();
@endphp

<a href="/admin/produtos" class="header-nav-link">
    Produtos
</a>
<a href="/admin/pedidos" class="header-nav-link">
    Pedidos
</a>
<a href="/admin/usuarios" class="header-nav-link">
    Usuários
</a>

@include('shared.header.avatar')
