<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$category->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white">
    @php
    $segments = request()->segments();
    @endphp
    </nav>
    @include('partials.header')
    <div class="flex justify-center gap-4">
        <div class="flex justify-center bg-white">
            <div class="container">
                <div class="flex items-center mx-2 mb-3">
                    <h2 class="text-sm font-semibold">
                        <a href="{{ url('/') }}">Home</a>
                        @foreach ($segments as $index => $segment)
                        /
                        @if ($index + 1 < count($segments))
                            <a href="{{ url(implode('/', array_slice($segments, 0, $index + 1))) }}">
                            {{ ucfirst($segment) }}
                            </a>
                            @else
                            {{ ucfirst($segment) }}
                            @endif
                            @endforeach
                    </h2>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 ">
                    @foreach ($products as $product)
                    <div class="relative flex flex-col flex-shrink-0 w-full mb-4 text-black duration-500 bg-white rounded shadow group hover:scale-105">
                        <!-- Gambar & Icon -->
                        <div class="relative p-3 aspect-square">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full" />
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
                        <div class="flex flex-col flex-grow px-4 text-center">
                            <div>
                                <p class="text-[13px] font-semibold uppercase leading-tight">{{ $product->name }}</p>
                                <div class="text-[13px]">
                                    @if($product->original_price)
                                    <span class="font-bold text-gray-400 line-through ">Rp{{ number_format($product->original_price, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="">
                                <span class="ml-1 text-lg text-red-500">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="px-3 py-2 mb-4">
                                <a href="{{ route('detail', $product->slug) }}" class="block w-full p-1 text-center rounded-md hover:text-white bg-slate-400 hover:bg-gray-800">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @include('partials.footer')

    <script>
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

        $.ajax({
            url: "{{ route('cart.add', $product->id) }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                quantity: 1
            },
            success: function(data) {
                if (data.success) {
                    alert(data.message); // <-- di sini baru alert muncul
                    // lalu update tampilan:
                    $('#totalPrice').text('Rp ' + new Intl.NumberFormat('id-ID').format(data.totalPrice));
                    $('#totalQuantity').text(data.totalQuantity);
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menambahkan produk.');
            }
        });
    </script>
</body>

</html>