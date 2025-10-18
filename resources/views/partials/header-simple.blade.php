<!-- Header -->
<header id="mainHeader"
    class="mx-auto sticky top-0 z-50 w-full h-[60px] transition-all duration-300 bg-white flex justify-center items-center shadow-md mb-10">
    <div class="container flex items-center justify-between w-full h-full p-4 mx-auto max-w-7xl">
        <!-- Logo -->
        <div class="flex-shrink-0 text-center">
            <a href="/" class="text-2xl font-bold tracking-widest text-black">SHOPY</a>
        </div>
        <!-- Menu Desktop -->

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