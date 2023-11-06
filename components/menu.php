<div class="relative w-full top-0 bg-white mx-auto px-6">
    <div class="flex justify-between items-center py-2 lg:space-x-10">
        <div class="flex justify-start w-20 h-20">
            <a>
                <span class="sr-only">Logo BDC</span>
                <img class="w-full h-full" src="images/logo-BDC.png" alt="Logo BDC">
            </a>
        </div>

        <nav class="hidden space-x-10 lg:flex items-center">
            <a href="#members" class="menu-text text-lg font-medium">Membres</a>
            <a href="#contact" class="ml-8 inline-flex items-center justify-end whitespace-nowrap rounded-md border border-transparent bg-purple-300 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-200">Contactez-nous</a>
        </nav>
        <div class="menu-desktop-btn flex items-center justify-end lg:hidden">
            <a onclick="doMenu()" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-purple-300 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </a>
        </div>
    </div>

    <div id="responsive-menu" class="menu-mobile-container absolute inset-x-0 top-0 origin-top-right transform p-2 transition hidden">
        <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 w-full">
            <div class="menu-mobile-top px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <img class="h-10 w-auto" src="images/logo-BDC.png" alt="Logo BDC">
                    </div>
                    <div class=" mr-2">
                        <button onclick="doMenu()" type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-200">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu-mobile-content space-y-6 py-6 px-5">
                <div class="grid grid-cols-2 gap-y-4 gap-x-4">
                    <a href="#members" class="menu-text text-base font-medium">Membres</a>
                    <a href="#support" class="menu-text text-base font-medium">Nous soutenir</a>
                </div>
                <div class="menu-mobile-container">
                    <a href="#contact" class="menu-mobile-btn flex w-full items-center justify-center rounded-md border border-transparent bg-purple-300 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-200">Nous
                        contacter</a>
                </div>
            </div>
        </div>
    </div>
</div>