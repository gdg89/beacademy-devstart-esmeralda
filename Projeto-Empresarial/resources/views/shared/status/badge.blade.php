<span class="
    px-3 py-1 rounded-full text-sm font-medium leading-5
    @if ($order->status == 'Processando')
        bg-yellow-200 text-yellow-700
        @elseif ($order->status == 'Recusado')
        bg-red-200 text-red-700
        @elseif ($order->status == 'Aprovado')
        bg-green-200 text-green-700
    @else
        badge-info
    @endif
">
    {{ $order->status }}
</span>
