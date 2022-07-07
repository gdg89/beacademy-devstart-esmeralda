<section class="w-full">
    <div class="container mx-auto px-5 pb-12 flex justify-between items-center">
        <form method="GET" action="/" class="flex w-full space-x-5">
            <input placeholder="Pesquisar produto" type="text" id="search" name="search" value="{{ request()->search }}"
                class="
                w-full bg-gray-100 bg-opacity-50 rounded
                border border-gray-300 py-1 px-3 leading-8
                focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200
                text-base outline-none text-gray-700
                transition-colors duration-200 ease-in-out
                " />

            <button type="submit"
                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                Pesquisar
            </button>
            <a href="@if (request()->search) / @else # @endif"
                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                Limpar
            </a>
        </form>
    </div>
</section>
