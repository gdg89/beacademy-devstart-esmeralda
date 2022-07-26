<aside id="cart-container"
    class="bg-gray-50 max-w-md h-[calc(100vh-5rem)] opacity-0 translate-x-full pointer-events-none fixed top-20 right-0 bottom-[72px] overflow-hidden z-10 ease-in-out duration-500 sm:duration-700 flex transform transition ">

    <div class="w-full flex h-full flex-col pointer-events-auto ">
        <div
            class="flex-1 overflow-y-auto py-6 px-4 sm:px-6 scrollbar-thin scrollbar-thumb-rounded-md scrollbar-thumb-emerald-600 scrollbar-track-gray-50 ">
            <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900">Carrinho</h2>
                <div class="ml-3 flex h-7 items-center">

                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500" id="cart-close-button"
                        title="Fechar Cart">
                        <svg class="h-6 w-6 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mt-8">
                <div class="flow-root">
                    <ul id="cart-list" role="list" class="-my-6 divide-y divide-gray-200">

                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
            <div class="flex justify-between text-base font-medium text-gray-900">
                <p>Total</p>
                <p id="cart-total"></p>
            </div>
            <div class="mt-6">
                <button id="cart-checkout-button" href="#"
                    class="w-full flex items-center justify-center rounded-md border border-transparent bg-emerald-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-emerald-700">
                    Fechar pedido
                </button>
            </div>

        </div>
    </div>
</aside>
