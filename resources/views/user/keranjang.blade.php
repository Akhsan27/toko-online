<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <title>User</title>
</head>

<body>
    @include ('partials.header-simple')
    <div class="flex justify-center">
        <div class="grid w-full grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
            <div class="w-full mr-0 md:mr-10 lg:mr-20">
                <div class="relative overflow-x-auto shadow-md">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @if(optional($cart)->items && $cart->items->count())
                            @foreach($cart->Items as $item)
                            <tr class="bg-white border-b border-gray-200 shadow-lg hover:bg-gray-50">
                                <th scope="row" class="flex w-full px-6 py-4 font-medium text-gray-800">
                                    <img src=" {{$item->product->image_url}}" alt="product-image" class="w-[50px] sm:w-[10px] md:w-[50px] lg:w-[50px] object-cover">
                                    <div class="ml-1">
                                        <h4 class="truncate max-w-[10ch] sm:max-w-none overflow-hidden whitespace-nowrap">
                                            {{$item->product->name}}
                                        </h4>

                                        <label>Color :</label>
                                        <span>{{ $item->product->color ?? 'Default' }}</span>
                                        <div class="flex mt-2">
                                            <form action="{{ route('cart.update', $item->id)}}" method="post" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="quantity" value="{{ $item->quantity -1 }}">
                                                <button type="submit">
                                                    <img src="{{ asset('asset/icon/kurang.svg') }}">
                                                </button>
                                            </form>
                                            <span class="mx-3">{{ $item->quantity }}</span>
                                            <form action="{{ route('cart.update', $item->id)}}" method="post" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="quantity" value="{{ $item->quantity +1 }}">
                                                <button type="submit">
                                                    <img src="{{ asset('asset/icon/tambah.svg') }}" alt="tambah">
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    Rp.{{ number_format($item->product->price, 2) }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <img src="{{ asset('asset/icon/delete.svg') }}" class="w-[20px]" alt="">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3" class="py-4 text-center">Keranjang Anda kosong.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mx-[20px] mt-4">
                <div class="flex justify-between">
                    <p>Jumlah</p>
                    <span id="totalPrice">Rp. {{ number_format($totalPrice,0, ',', '.') }}</span>
                </div>
                <div class="my-3">
                    <input type="text" id="promoInput" placeholder="Masukkan kode promo" class="w-full p-2 border">
                    <button id="applyPromo" class="px-4 py-2 mt-2 text-white bg-blue-500">Apply Diskon</button>
                </div>

                {{-- Div diskon yang akan di-update --}}
                <div id="discountRow" class="justify-between hidden my-3"> {{-- Awalnya sembunyikan --}}
                    <p>Diskon</p>
                    <span id="discountValue">-</span>
                </div>
                <hr class="border border-gray-600 ">
                <div class="flex justify-between my-5 font-bold ">
                    <p class>Jumlah Total</p>
                    <span id="totalBelanja">Rp {{ number_format($totalBelanja, 0, ',','.') }}</span>
                </div>
                <div class="flex flex-col justify-between gap-2 sm:flex-row">
                    <button type="submit" class="flex-1 px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Checkout
                    </button>
                    <button type="button" class="flex-1 px-4 py-2 font-semibold text-white bg-black rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateTotals() {
            $.ajax({
                url: "{{ route('cart.totals') }}",
                method: 'GET',
                success: function(data) {
                    $('#totalQuantity').text(data.totalQuantity);
                    $('#totalPrice').text('Rp. ' + new Intl.NumberFormat('id-ID').format(data.totalPrice));
                    $('#totalBelanja').text('Rp. ' + new Intl.NumberFormat('id-ID').format(data.totalBelanja));
                }
            });
        }

        $(document).on('click', '.btn-update, .btn-remove', function() {
            setTimeout(updateTotals, 300);
        });

        $(document).ready(function() {
            $('#applyPromo').click(function(e) {
                e.preventDefault();
                var promoCode = $('#promoInput').val().trim();
                if (!promoCode) {
                    alert('Masukkan kode promo!');
                    return;
                }
                $.post("{{ route('cart.diskon') }}", {
                    promo_code: promoCode,
                    _token: '{{ csrf_token() }}'
                }, function(data) {
                    if (data.success) {
                        alert(data.message);
                        updateDiscountDisplay(data.discountValue || 0, data.finalTotal || null);
                        updateTotals();
                        $('#promoInput').val('');
                    } else {
                        alert(data.message);
                    }
                }).fail(function(xhr) {
                    console.log('Error AJAX:', xhr.responseText);
                    alert('Error: ' + (xhr.status === 404 ? 'Route tidak ditemukan!' : 'Coba lagi!'));
                });
            });

            totalBelanja();
        });

        function totalBelanja() {
            $.ajax({
                url: "{{ route('cart.totals') }}",
                method: "GET",
                success: function(data) {
                    console.log("Response dari Laravel:", data); // 🔍 tambahkan ini
                    $('#totalPrice').text('Rp.' + new Intl.NumberFormat('id-ID').format(data.totalPrice));
                    $('#totalQuantity').text(data.totalQuantity);
                    $('#totalBelanja').text('Rp.' + new Intl.NumberFormat('id-ID').format(data.totalBelanja));
                },
                error: function(xhr) {
                    console.log("Error:", xhr.responseText);
                }
            });
        }

        function updateDiscountDisplay(discountValue, finalTotal = null) {
            $('#discountRow').removeClass('hidden');
            $('#discountValue').text('-Rp. ' + new Intl.NumberFormat('id-ID').format(discountValue));
            if (finalTotal !== null) {
                $('#totalBelanja').text('Rp. ' + new Intl.NumberFormat('id-ID').format(finalTotal));
            }
        }
    </script>

</body>

</html>