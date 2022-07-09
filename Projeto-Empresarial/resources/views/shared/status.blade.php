<span class="
    badge badge-md
    @if ($order->status == 'Processando')
        badge-warning
    @elseif ($order->status == 'Recusado')
        badge-error
    @elseif ($order->status == 'Aprovado')
        badge-success
    @else
        badge-info
    @endif
">
    {{ $order->status }}
</span>
