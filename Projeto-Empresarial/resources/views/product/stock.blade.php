<div class="my-3 absolute bottom-0 right-2">
    @if ($product->stock > 0)
    <span class="
        inline-flex items-center px-3 py-0.5
        rounded-full text-sm
        font-medium bg-emerald-100 text-emerald-800
    ">
        {{ $product->stock }} em estoque
    </span>
    @else
    <span class="
        inline-flex items-center px-3 py-0.5
        rounded-full text-sm
        font-medium bg-red-100 text-red-800
    ">
        Fora de estoque
    </span>
    @endif
</div>
