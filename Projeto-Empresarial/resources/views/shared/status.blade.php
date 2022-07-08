<span class="
    px-3 py-1 text-sm font-medium
    inline-flex items-center justify-center
    rounded-full
    @if ($order->status == 'Processando')
        bg-yellow-200 text-yellow-800
    @elseif ($order->status == 'Recusado')
        bg-red-200 text-red-700
    @elseif ($order->status == 'Aprovado')
        bg-green-200 text-green-800
    @else
        bg-indigo-200 text-indigo-800
    @endif
">
    {{ $order->status }}
</span>
