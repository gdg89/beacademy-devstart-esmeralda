{{-- <header class="bg-indigo-500">
    <div class="container mx-auto flex justify-between p-5 items-center">
        <a href="@if(Route::currentRouteName() === 'home') # @else / @endif"
            class="flex title-font font-medium items-center text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-700 p-2 bg-white rounded-full"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <span class="ml-3 text-xl text-white">EstanteDev</span>
        </a>
        <div class="flex items-center">

            <a href="#"
                class="inline-flex items-center bg-white border-0 py-1 px-3 focus:outline-none hover:bg-gray-100 rounded text-indigo-500 md:mt-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                Login
            </a>

            <a href="#"
                class="inline-flex items-center bg-white border-0 py-1 px-3 focus:outline-none hover:bg-gray-100 rounded text-indigo-500 md:mt-0">
                Admin
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</header> --}}


<header class="text-white body-font bg-indigo-500 sticky top-0 z-50">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="@if(Route::currentRouteName() === 'home') # @else / @endif"
            class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-500 p-2 bg-white rounded-full"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <span class="ml-3 text-xl text-white">EstanteDev</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-indigo-700 justify-center">
            <a href="#"
                class="inline-flex items-center bg-white border-0 py-1 px-3 focus:outline-none hover:bg-gray-100 rounded text-indigo-500 md:mt-0">
                Login
            </a>
        </nav>
        <button class="
            inline-flex items-center
          bg-white text-indigo-700 text-base
            md:ml-4 mt-4 md:mt-0 py-1 px-3
            focus:outline-none hover:bg-gray-100
            rounded border-0
        ">
            Admin
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</header>
