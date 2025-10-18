<!-- Top Bar -->
<div id="topBar" class="relative flex items-center justify-center w-full h-10 overflow-hidden text-gray-300 bg-black">
    <div class="whitespace-nowrap animate-marquee">
        <span class="px-4">🎉 Selamat Datang di Toko Kami — Silakan Berbelanja Sekarang! 🎉</span>
    </div>
</div>

<!-- Header -->
<header id="mainHeader"
    class="mx-auto sticky top-0 z-50 w-full h-[100px] transition-all duration-300 bg-white flex justify-center items-center">
    <div class="container flex items-center justify-between w-full h-full p-4 mx-auto max-w-7xl">
        <!-- Logo -->
        <div class="flex-shrink-0 text-center">
            <a href="/" class="text-2xl font-bold tracking-widest text-black">SHOPY</a>
        </div>

        <!-- Search Button & Form Container -->
        <div id="searchContainer" class="relative flex items-center justify-center flex-grow max-w-md ">
            <form action="/search" method="GET" class="relative flex items-center w-full mx-2 sm:w-64 md:w-80">
                <input
                    type="text"
                    name="q"
                    placeholder="Cari produk..."
                    class="w-full py-2 pl-4 pr-10 text-sm border border-gray-400 rounded-full focus:outline-none focus:ring-2 focus:ring-black focus:border-black" />
                <button type="submit" class="absolute -translate-y-1/2 right-3 top-1/2">
                    <img src="{{ asset('asset/search.svg') }}" alt="Search" class="w-5 h-5 opacity-60 hover:opacity-100" />
                </button>
            </form>
        </div>
        <!-- Menu Desktop -->
        <div class="items-center flex-shrink-0 hidden space-x-4 text-sm md:flex">
            <button class="p-2 transition rounded-full hover:bg-gray-100">
                <img src="{{ asset('asset/heart.svg') }}" alt="Wishlist" class="w-6 h-6">
            </button>
            @guest
            <a href="/login" class="p-2 transition rounded-full hover:bg-gray-100">
                <img src="{{ asset('asset/cart.svg') }}" alt="Cart" class="w-5 h-5" />
            </a>
            <a href="{{ route('login') }}" class="px-3 py-2 text-xs font-semibold duration-100 rounded-md hover:bg-slate-300">LOG IN</a>
            <a href="{{ route('register') }}" class="px-3 py-2 text-xs font-semibold bg-[#222222] text-white rounded-md duration-100 hover:bg-slate-300">SIGN UP</a>
            @endguest
            @auth
            <a href="/keranjang" class="p-2 transition rounded-full hover:bg-gray-100">
                <img src="{{ asset('asset/cart.svg') }}" alt="Cart" class="w-5 h-5" />
            </a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                    Logout
                </button>
            </form>
            @endauth
        </div>

        <!-- Hamburger Menu (Mobile) -->
        <div id="menuHamburger" class="flex flex-col ml-2 space-y-1 cursor-pointer md:hidden sm:ml-[30px]">
            <span class="block w-6 h-1 bg-black rounded"></span>
            <span class="block w-6 h-1 bg-black rounded"></span>
            <span class="block w-6 h-1 bg-black rounded"></span>
        </div>
    </div>
</header>
<!-- Overlay -->
<div id="overlay" class="fixed inset-0 hidden bg-black bg-opacity-50 z-[998]"></div>
<!-- Menu Kategori (Desktop) -->
<div class="justify-center hidden w-full pb-4 bg-white md:flex">
    <div class="container flex items-center justify-between h-[40px]">
        <!-- Kategori -->
        <ul class="flex items-center space-x-3">
            @foreach ($categories as $category)
            <li>
                <a href="{{ route('showAll', $category->slug) }}"
                    class="px-5 py-2 text-sm font-semibold text-gray-800 transition duration-300 bg-gray-100 border border-gray-200 rounded-full hover:bg-black hover:text-white hover:shadow-md">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>


<!-- Mobile Menu -->
<div id="mobileMenu"
    class="hidden fixed top-0 left-0 w-[300px] h-full bg-white shadow-lg z-[999] transition-transform duration-300 transform -translate-x-full md:hidden">
    <div class="flex items-center justify-between p-4 border-b">
        <h2 class="text-lg font-semibold">Menu</h2>
        <button id="closeMobileMenu" class="p-2 rounded-lg hover:bg-gray-100">
            <img src="{{ asset('asset/x.svg') }}" alt="Close" class="w-5 h-5">
        </button>
    </div>
    <div class="flex items-center justify-around p-4 border-b">
        <a href="/keranjang" class="flex flex-col items-center">
            <img src="{{ asset('asset/cart.svg') }}" alt="Cart" class="w-6 h-6">
            <span class="mt-1 text-xs">Keranjang</span>
        </a>
        <button class="flex flex-col items-center">
            <img src="{{ asset('asset/heart.svg') }}" alt="Wishlist" class="w-6 h-6">
            <span class="mt-1 text-xs">Wishlist</span>
        </button>
    </div>
    <div class="p-4">
        <h3 class="mb-3 text-sm font-semibold text-gray-700">Kategori</h3>
        <ul class="flex flex-col space-y-3">
            @foreach ($categories as $category)
            <li>
                <a href="{{ route('showAll', $category->slug) }}"
                    class="block px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 hover:text-black">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="p-4 border-t">
        @guest
        <a href="{{ route('login') }}" class="block w-full px-4 py-2 mb-2 text-sm font-semibold text-center text-white bg-black rounded-lg hover:bg-gray-800">Log In</a>
        <a href="{{ route('register') }}" class="block w-full px-4 py-2 text-sm font-semibold text-center border border-black rounded-lg hover:bg-gray-100">Sign Up</a>
        @endguest
        @auth
        <span class="text-gray-700">Halo, {{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit"
                class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
        @endauth
    </div>
</div>

<!-- Script -->
<script>
    const menuHamburger = document.getElementById('menuHamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMobileMenu = document.getElementById('closeMobileMenu');

    function toggleCart() {
        cartSidebar.classList.toggle('translate-x-full');
        overlay.classList.toggle('hidden');
    }

    // Mobile menu toggle
    menuHamburger.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
        overlay.classList.remove('hidden');
        setTimeout(() => mobileMenu.classList.remove('-translate-x-full'), 10);
    });

    closeMobileMenu.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        setTimeout(() => mobileMenu.classList.add('hidden'), 300);
    });


    // Shrink header on scroll
    const topBar = document.getElementById('topBar');
    const header = document.getElementById('mainHeader');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 0) {
            topBar.classList.add('opacity-0');
            header.classList.add('h-[60px]');
            header.classList.remove('h-[100px]');
        } else {
            topBar.classList.remove('opacity-0');
            header.classList.add('h-[100px]');
            header.classList.remove('h-[60px]');
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        const searchBtn = document.getElementById('searchBtn');
        const searchForm = document.getElementById('searchForm');
        const closeSearch = document.getElementById('closeSearch');

        searchBtn.addEventListener('click', () => {
            searchBtn.classList.add('opacity-0', 'pointer-events-none');
            searchForm.classList.remove('opacity-0', 'pointer-events-none');
            searchForm.querySelector('input[name="q"]').focus();
        });

        closeSearch.addEventListener('click', () => {
            searchForm.classList.add('opacity-0', 'pointer-events-none');
            searchBtn.classList.remove('opacity-0', 'pointer-events-none');
        });
    });
</script>

<style>
    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .animate-marquee {
        display: inline-block;
        animation: marquee 12s linear infinite;
    }
</style>