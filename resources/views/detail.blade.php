<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white ">
    @php
    $segments = request()->segments();
    @endphp
    {{-- Tampilan breadcrumb --}}
    @include('partials.header')
    <div class="max-w-6xl p-4 mx-auto sm:p-6">
        <!-- Breadcrumb -->
        <div class="flex flex-wrap items-center justify-between mb-4">
            <h2 class="text-lg font-medium text-[14px]">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-800">Home</a>
                @foreach ($segments as $index => $segment)
                /
                @if ($index + 1 < count($segments))
                    <a href="{{ url(implode('/', array_slice($segments, 0, $index + 1))) }}"
                    class="text-gray-600 hover:text-gray-800">
                    {{ ucfirst($segment) }}
                    </a>
                    @else
                    <span class="font-semibold text-gray-800">{{ ucfirst($segment) }}</span>
                    @endif
                    @endforeach
            </h2>
        </div>

        <!-- Kontainer Produk -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            {{-- Gambar Produk --}}
            <div class="w-full">
                <div class="p-3 sm:p-5">
                    <img src="{{ $product->image_url }}"
                        alt="{{ $product->name }}"
                        class="object-cover w-full max-h-[450px] rounded-lg border border-gray-200 shadow-sm">
                </div>
            </div>

            {{-- Detail Produk --}}
            <div class="p-4 sm:p-6">
                <h3 class="text-2xl font-semibold uppercase">{{ $product->name }}</h3>
                <p class="mb-4 text-sm text-gray-600 sm:text-base">
                    Kategori: {{ $product->category->name ?? '-' }}
                </p>

                {{-- Harga --}}
                <div class="mb-4 text-xl font-bold text-red-500 sm:text-2xl">
                    Rp{{ number_format($product->price, 0, ',', '.') }}
                    <hr class="mt-2 border-gray-300">
                </div>

                {{-- Pilihan Warna --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold sm:text-base">Pilih Warna:</label>
                    <select name="color"
                        class="w-full px-3 py-2 text-sm border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">Pilih warna</option>
                        <option value="merah">Merah</option>
                        <option value="biru">Biru</option>
                        <option value="hitam">Hitam</option>
                    </select>
                </div>

                {{-- Jumlah --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold sm:text-base">Jumlah:</label>
                    <input type="number" name="qty" value="1" min="1"
                        class="w-24 px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex flex-col gap-3 mt-6 sm:flex-row">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit"
                        class="px-6 py-3 text-sm font-bold text-white transition bg-green-600 rounded-lg hover:bg-green-500 focus:ring-2 focus:ring-green-400">
                        Chat Via Whatsapp
                    </button>
                    <button type="button"
                        class="px-6 py-3 text-sm font-bold text-white transition bg-gray-800 rounded-lg hover:bg-gray-700 focus:ring-2 focus:ring-gray-500">
                        Tambah ke Keranjang
                    </button>
                </div>

                {{-- Deskripsi --}}
                <div class="mt-6">
                    <p class="mb-1 font-semibold text-gray-800">Deskripsi:</p>
                    <p class="text-sm leading-relaxed text-gray-600 sm:text-base">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- product tampilan -->
    <div class="flex justify-center p-4 bg-white product-carousel">
        <div class="container">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-xl font-semibold">Related Product</h2>
            </div>
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach ($relatedProduct as $item)
                <div class="relative flex flex-col transition-all duration-300 bg-white border border-transparent rounded-lg shadow-md hover:border-gray-700 group">
                    <!-- Gambar & Icon -->
                    <div class="relative p-4">
                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}"
                            class="object-cover w-full transition-transform duration-300 rounded-t-lg h-44 group-hover:scale-105" />
                        <div class="absolute inset-y-0 right-0 flex flex-col justify-center gap-2 pr-2 transition-opacity duration-300 opacity-0 group-hover:opacity-100">
                            <a href="#" class="p-2 bg-white rounded-full shadow hover:bg-gray-200">
                                <img src="{{ asset('asset/heart.svg') }}" alt="wishlist" class="w-5 h-5">
                            </a>
                            <a href="#" class="p-2 bg-white rounded-full shadow hover:bg-gray-200">
                                <img src="{{ asset('asset/cart.svg') }}" alt="cart" class="w-5 h-5">
                            </a>
                        </div>
                    </div>

                    <!-- Detail -->
                    <div class="flex flex-col flex-grow p-3 text-center">
                        <p class="text-sm font-semibold leading-tight uppercase line-clamp-2">{{ $item->name }}</p>
                        <div class="mt-1 text-sm">
                            @if($item->original_price)
                            <span class="text-gray-400 line-through">Rp{{ number_format($item->original_price, 0, ',', '.') }}</span>
                            @endif
                        </div>
                        <div>
                            <span class="text-lg font-bold text-red-500">Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('detail', $item->slug) }}"
                                class="block w-full py-2 text-sm font-medium text-white transition-colors bg-gray-600 rounded-md hover:bg-gray-800">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    @include('partials.footer')

    <script>

    </script>
</body>

</html>