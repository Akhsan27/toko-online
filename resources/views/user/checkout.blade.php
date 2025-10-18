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

<body class="bg-gray-100">
    @include('partials.header-simple')
    <div class="flex justify-center">
        <div class="container">
            <div class="w-full mr-0 md:mr-10 lg:mr-20">
                <div class="p-4 text-sm text-black bg-white shadow-lg ">
                   @foreach ($addresses as $user)
                     <p> {{$user->first_name}}</p>
                    <span>Muhammad Akhsanil Umam </span>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero commodi rerum dolore perspiciatis iste culpa natus adipisci nostrum ex, excepturi voluptate nisi nesciunt a facilis dolorum! Mollitia, aut aliquid? Temporibus numquam optio harum dolorem, tempora a libero eaque minus perferendis omnis, sequi voluptatibus distinctio? Esse saepe omnis suscipit error quas?</p>
                   @endforeach
                    <div class="flex justify-end w-full mt-3">
                        <a href="#" class="px-3 py-1 text-green-400 border border-black rounded-md hover:bg-black">Ubah</a>
                    </div>
                </div>
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
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="bg-white border-b border-gray-200 shadow-lg hover:bg-gray-50">
                                <th scope="row" class="flex w-full px-6 py-4 font-medium text-gray-800">
                                    <img src="{{ asset('asset/icon/icon.png') }}" alt="product-image" class="w-[50px] sm:w-[10px] md:w-[50px] lg:w-[50px]">
                                    <div class="ml-1">
                                        <h4 class="truncate max-w-[10ch] sm:max-w-none overflow-hidden whitespace-nowrap">
                                            Apple MacBook Pro 17"
                                        </h4>

                                        <label>Color :</label>
                                        <span>Boots</span>
                                        <div class="flex mt-2">
                                            <a href=""><img src="{{ asset('asset/icon/kurang.svg') }}" alt="kurang"></a>
                                            <span class="mx-3">3</span>
                                            <a href=""><img src="{{ asset('asset/icon/tambah.svg') }}" alt="tambah"></a>
                                        </div>
                                    </div>

                                </th>
                                <td class="px-6 py-4">
                                    $2999
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between my-4 font-bold">
                    <p>Jumlah Total</p>
                    <span>Rp. 200.000,00</span>
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
</body>

</html>