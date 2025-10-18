<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href"{{ asset('asset/icon/icon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-800">
    @include('partials.header')
    <!-- carousel untuk screen layar  -->
    <div class="flex justify-center py-10 mb-1.5">
        <div class="container grid items-center gap-8 px-4 md:grid-cols-12 responsif">
            <!-- Bagian Kiri -->
            <div class="col-span-8 text-center md:text-left">
                <h1 class="text-3xl font-extrabold leading-snug text-white sm:text-4xl md:text-5xl lg:text-6xl">
                    Discover <br />
                    <span class="text-white">Comfort and Style</span> for <br />
                    Every Occasion
                </h1>
                <p class="mt-4 text-sm leading-relaxed text-gray-300 sm:text-base md:text-lg">
                    Discover the perfect balance of comfort, durability, and style for every
                    occasion with our versatile, high-quality footwear collection.
                </p>
                <div class="flex justify-center mt-6 md:justify-start">
                    <button class="flex items-center gap-2 px-6 py-3 text-base font-semibold text-white transition duration-300 bg-black rounded-full shadow-md hover:scale-105 hover:bg-gray-700 sm:text-lg">
                        Explore
                        <span class="text-xl">➜</span>
                    </button>
                </div>
            </div>

            <!-- Bagian Kanan -->
            <div class="flex items-center justify-start col-span-4 text-left md:justify-center md:text-center">
                <!-- Rating & Deskripsi -->
                <div class="p-4 rounded-lg">
                    <div class="flex items-center justify-center gap-2 md:justify-start">
                        <div class="flex text-lg text-yellow-400">★★★★★</div>
                        <span class="text-sm font-semibold text-white sm:text-base">4.9 / 399 Reviews</span>
                    </div>
                    <h3 class="mt-3 text-base font-bold text-white sm:text-lg">
                        Comfort, Style, Versatility, Quality
                    </h3>
                    <p class="mt-2 text-xs leading-relaxed text-gray-300 sm:text-sm md:text-base">
                        These shoes offer incredible comfort and style. Perfect for every
                        occasion, I wear them daily.
                    </p>
                    <div class="flex justify-center gap-3 mt-6 md:justify-start">
                        <button class="p-2 text-white transition border border-white rounded-full hover:text-gray-800 hover:bg-gray-100">←</button>
                        <button class="p-2 text-white transition border border-white rounded-full hover:text-gray-800 hover:bg-gray-100">→</button>
                    </div>
                </div>

                <!-- Navigasi Panah -->

            </div>
        </div>
    </div>
    <div class="w-full bg-gray-800 layout relative overflow-hidden h-[180px] sm:h-[250px] md:h-[300px] lg:h-[500px]">
        <div id="headerImg" class="relative w-full h-full">
            <img src="/images/label-promo/promo1.png" alt="" class="absolute inset-0 object-cover w-full h-full transition-opacity duration-700 opacity-100 carousel-slide" />
            <img src="/images/label-promo/promo2.png" alt="" class="absolute inset-0 object-cover w-full h-full transition-opacity duration-700 opacity-0 carousel-slide" />
            <img src="/images/label-promo/promo3.png" alt="" class="absolute inset-0 object-cover w-full h-full transition-opacity duration-700 opacity-0 carousel-slide" />
            <!-- Tombol Panah -->
            <button id="prevBtn" class="absolute z-20 p-2 text-white -translate-y-1/2 bg-black rounded-full left-4 top-1/2 bg-opacity-40 hover:bg-opacity-70">
                &#10094;
            </button>
            <button id="nextBtn" class="absolute z-20 p-2 text-white -translate-y-1/2 bg-black rounded-full right-4 top-1/2 bg-opacity-40 hover:bg-opacity-70">
                &#10095;
            </button>
            <!-- Pagination Dots -->
            <div id="dotsContainer" class="absolute z-20 flex space-x-3 -translate-x-1/2 bottom-3 sm:bottom-4 left-1/2">
                <!-- Dots akan dibuat dinamis dengan JS -->
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="text-center bg-gray-800 rounded-lg">
            <h1 class="text-white text-[40px] font-bold">POPULAR SHOES</h1>
        </div>
    </div>
    <!-- Promo Barang potongan harga -->
    <div class="flex justify-center p-4 product carousel">
        <div class="container relative kategori-carousel">
            <!-- Tombol Kiri -->
            <button class="absolute z-10 p-2 -translate-y-1/2 bg-white rounded-full hover:bg-gray-200 prevBtn left-2 top-1/2 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 15.707a1 1 0 01-1.414 0L6.586 11l4.707-4.707a1 1 0 111.414 1.414L9.414 11l3.293 3.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <button class="absolute z-10 p-2 -translate-y-1/2 bg-white rounded-full shadow nextBtn right-2 top-1/2 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 4.293a1 1 0 011.414 0L13.414 9l-4.707 4.707a1 1 0 01-1.414-1.414L10.586 9 7.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <div class="flex gap-3 p-4 overflow-hidden scroll-smooth carousel-container">
                @foreach ($products as $product)
                <div class="flex-shrink-0 w-[140px] sm:w-[180px] md:w-[230px] bg-white text-black rounded-lg shadow-md relative group flex flex-col max-h-[350px] transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-black hover:border ">
                    <!-- Gambar & Icon -->
                    <div class="relative aspect-square">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                            class="w-full h-full p-4 transition-transform duration-300" />

                        <!-- Icon Wishlist & Cart -->
                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                            @csrf
                            <div class="absolute inset-y-0 right-0 flex flex-col justify-center gap-3 pr-2 transition-opacity opacity-0 group-hover:opacity-100">
                                <a href="#" class="p-2 bg-white rounded-full shadow hover:bg-gray-200">
                                    <img src="{{ asset('asset/heart.svg') }}" alt="wishlist" class="w-[18px] h-[18px]">
                                </a>
                                <button class="p-2 bg-white rounded-full shadow hover:bg-gray-200">
                                    <img src="{{ asset('asset/cart.svg') }}" alt="cart" class="w-[18px] h-[18px]">
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Detail Produk -->
                    <div class="flex flex-col justify-between flex-grow mb-3 text-center">
                        <!-- Nama & Harga Awal -->
                        <div>
                            <p class="text-[13px] font-semibold uppercase leading-tight">
                                {{ $product->name }}
                            </p>
                            <div class="text-[13px] ">
                                @if($product->original_price)
                                <span class="ml-1 text-lg text-red-500">
                                    Rp{{ number_format($product->original_price, 0, ',', '.') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Harga Sekarang -->
                        <div>
                            <span class="ml-1 text-lg text-red-500">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <!-- Tombol Lihat Detail -->
                        <div class="px-3 mt-4">
                            <a href="{{ route('detail', $product->slug) }}"
                                class="block w-full py-1 text-center transition-all duration-300 bg-gray-200 rounded-md hover:bg-gray-800 hover:text-white">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Baris per merk atau kategori -->
    <div class="flex justify-center p-4 bg-white product-carousel">
        <div class="container">
            @foreach ($categoriesTake as $category)
            <div class="relative kategori-carousel">
                <div class="flex justify-between">
                    <h2 class="mb-3 text-xl font-bold ">{{ $category->name}}</h2>
                    <a href="{{ route('showAll', $category->slug) }}">View All</a>
                </div>

                <!-- tombol kiri -->
                <button class="absolute z-10 p-2 -translate-y-1/2 bg-white rounded-full shadow prevBtn left-2 top-1/2 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 15.707a1 1 0 01-1.414 0L6.586 11l4.707-4.707a1 1 0 111.414 1.414L9.414 11l3.293 3.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Tombol Kanan -->
                <button class="absolute z-10 p-2 -translate-y-1/2 bg-white rounded-full shadow nextBtn right-2 top-1/2 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 4.293a1 1 0 011.414 0L13.414 9l-4.707 4.707a1 1 0 01-1.414-1.414L10.586 9 7.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Wrapper Carousel -->
                <div class="flex gap-4 p-4 overflow-hidden scroll-smooth overlow-scroll carousel-container">
                    @foreach ($category->products as $product)
                    <div class="flex-shrink-0 w-[140px] sm:w-[180px] md:w-[230px] bg-white text-black rounded shadow relative group flex flex-col max-h-[380px] duration-300 hover:scale-105 hover:border hover:border-gray-800">
                        <!-- Gambar & Icon -->
                        <div class="relative aspect-square">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full p-4" />
                            <form action="{{ route('cart.add', $product->id) }}" method="post">
                            @csrf
                            <div class="absolute inset-y-0 right-0 flex flex-col justify-center gap-3 pr-2 transition-opacity opacity-0 group-hover:opacity-100">
                                <a href="#" class="p-2 bg-white rounded-full shadow hover:bg-gray-200">
                                    <img src="{{ asset('asset/heart.svg') }}" alt="wishlist" class="w-[18px] h-[18px]">
                                </a>
                                <button class="p-2 bg-white rounded-full shadow hover:bg-gray-200">
                                    <img src="{{ asset('asset/cart.svg') }}" alt="cart" class="w-[18px] h-[18px]">
                                </button>
                            </div>
                        </form>
                        </div>
                        <!-- Detail -->
                        <div class="flex flex-col justify-between flex-grow px-4 pb-4 text-center">
                            <div>
                                <p class="text-[13px] font-semibold uppercase leading-tight mt-2 line-clamp-2">{{ $product->name }}</p>
                                <div class="text-[13px] mt-1">
                                    @if($product->original_price)
                                    <span class="ml-1 text-lg text-red-500">Rp{{ number_format($product->original_price, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <span class="ml-1 text-lg text-red-500">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="mt-4 ">
                                <a href="{{ route('detail', $product->slug) }}" class="block w-full py-1 text-center transition-all duration-300 bg-gray-200 rounded-md hover:bg-gray-800 hover:text-white">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @include('partials.footer')


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('#headerImg .carousel-slide');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const dotsContainer = document.getElementById('dotsContainer');
            let currentIndex = 0;
            let interval;

            // Buat pagination dots
            slides.forEach((_, i) => {
                const dot = document.createElement('button');
                dot.className = 'w-3 h-3 rounded-full bg-white bg-opacity-50 transition-opacity duration-300';
                if (i === 0) dot.classList.add('bg-opacity-100');
                dot.addEventListener('click', () => {
                    goToSlide(i);
                    resetInterval();
                });
                dotsContainer.appendChild(dot);
            });

            const dots = dotsContainer.children;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.style.opacity = i === index ? '1' : '0';
                    slide.style.zIndex = i === index ? '10' : '0';
                    dots[i].classList.toggle('bg-opacity-100', i === index);
                    dots[i].classList.toggle('bg-opacity-50', i !== index);
                });
            }

            function goToSlide(index) {
                currentIndex = index;
                showSlide(currentIndex);
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                showSlide(currentIndex);
            }

            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetInterval();
            });

            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetInterval();
            });

            function resetInterval() {
                clearInterval(interval);
                interval = setInterval(nextSlide, 5000);
            }

            // Mulai autoplay
            interval = setInterval(nextSlide, 5000);

            // Tampilkan slide pertama
            showSlide(currentIndex);
        });

        // membuat hover icon cart
        const card = document.querySelector('.group');
        const cartIcon = document.getElementById('cartIcon');

        //untuk mouse hover (desktop)
        card.addEventListener('mouseenter', () => {
            cartIcon.classList.remove('opacity-0');
            cartIcon.classList.add('opacity-100');
        });

        card.addEventListener('mouseleave', () => {
            cartIcon.classList.remove('opacity-100');
            cartIcon.classList.add('opacity-0');
        });

        //untuk sentuhan mobile
        card.addEventListener('touchstart', () => {
            cartIcon.classList.remove('opacity-0');
            cartIcon.classList.add('opacity-100');
        });

        //optional: sembunyikansaat disentuh di luar
        document.addEventListener('touchstart', (e) => {
            if (!card.contains(e.target)) {
                cartIcon.classList.remove('opacity-100');
                cartIcon.classList.add('opacity-0');
            }
        });


        //tombol scroll
        document.querySelectorAll('.kategori-carousel').forEach(kategori => {
            const carousel = kategori.querySelector('.carousel-container');
            const prevBtn = kategori.querySelector('.prevBtn');
            const nextBtn = kategori.querySelector('.nextBtn');
            const scrollAmount = 270 + 24;

            nextBtn.addEventListener('click', () => {
                carousel.scrollBy({
                    left: scrollAmount,
                    behavior: "smooth"
                });
            });
            prevBtn.addEventListener('click', () => {
                carousel.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            });
        });


        // Tambahkan animasi fade-in untuk produk saat halaman dimuat
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.group').forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('fade-in-up');
                }, index * 100); // efek berurutan
            });

            // Tambahkan efek 'float' untuk gambar di carousel
            document.querySelectorAll('.carousel-slide').forEach(img => {
                img.classList.add('float');
            });
        });
    </script>
</body>

</html>