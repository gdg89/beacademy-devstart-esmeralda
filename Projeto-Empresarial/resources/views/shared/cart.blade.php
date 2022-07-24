<!-- This example requires Tailwind CSS v2.0+ -->
<aside id="cart-container"
    class="bg-gray-100 max-w-md h-[calc(100vh-5rem)] opacity-100 translate-x-0 pointer-events-none fixed top-20 right-0 bottom-0 overflow-hidden z-10 ease-in-out duration-500 sm:duration-700 flex transform transition ">

    <div class="w-full flex h-full flex-col overflow-y-scroll pointer-events-auto">
        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
            <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Carrinho</h2>
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
                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                    alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                    class="h-full w-full object-cover object-center">
                            </div>

                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <a href="#"> Throwback Hip Bag </a>
                                        </h3>
                                        <p class="ml-4">$90.00</p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Salmon</p>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500">Qty 1</p>

                                    <div class="flex">
                                        <button type="button"
                                            class="font-medium text-emerald-600 hover:text-emerald-500">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                    alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                    class="h-full w-full object-cover object-center">
                            </div>

                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <a href="#"> Medium Stuff Satchel </a>
                                        </h3>
                                        <p class="ml-4">$32.00</p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Blue</p>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500">Qty 1</p>

                                    <div class="flex">
                                        <button type="button"
                                            class="font-medium text-emerald-600 hover:text-emerald-500">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                    alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                    class="h-full w-full object-cover object-center">
                            </div>

                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <a href="#"> Medium Stuff Satchel </a>
                                        </h3>
                                        <p class="ml-4">$32.00</p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Blue</p>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500">Qty 1</p>

                                    <div class="flex">
                                        <button type="button"
                                            class="font-medium text-emerald-600 hover:text-emerald-500">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                    alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                    class="h-full w-full object-cover object-center">
                            </div>

                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <a href="#"> Medium Stuff Satchel </a>
                                        </h3>
                                        <p class="ml-4">$32.00</p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Blue</p>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500">Qty 1</p>

                                    <div class="flex">
                                        <button type="button"
                                            class="font-medium text-emerald-600 hover:text-emerald-500">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                    alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                    class="h-full w-full object-cover object-center">
                            </div>

                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <a href="#"> Medium Stuff Satchel </a>
                                        </h3>
                                        <p class="ml-4">$32.00</p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Blue</p>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500">Qty 1</p>

                                    <div class="flex">
                                        <button type="button"
                                            class="font-medium text-emerald-600 hover:text-emerald-500">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- More products... -->
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
            <div class="flex justify-between text-base font-medium text-gray-900">
                <p>Total</p>
                <p>$262.00</p>
            </div>
            <div class="mt-6">
                <a href="#"
                    class="flex items-center justify-center rounded-md border border-transparent bg-emerald-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-emerald-700">
                    Checkout
                </a>
            </div>

        </div>
    </div>
</aside>
