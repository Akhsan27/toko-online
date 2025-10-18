<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard_Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-500">
    @include('admin.header')
    @include('admin.sidebar')
    <div class=" h-[100px] bg-gray-900 sm:ml-64 mt-[60px] flex pl-5" style="align-items:center">
        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
        </svg>
        <h2 class="text-white text-[20px] ml-3">Input Barang</h2>
    </div>
    <div class="sm:ml-64">
        <div class="w-full sm:max-w-full md:max-w-[70%] p-6 mx-auto bg-white rounded-lg shadow-lg">
            <form method="POST" action="{{ route('admin.inputbarang') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="text-gray-600 text-[14px] block" style="margin-bottom: 10px;">Nama Barang</label>
                    <input type="text" name="name" class="w-full px-4 py-2 text-sm uppercase bg-transparent border border-b-2 border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Nama Barang" required>
                </div>

                <div class="grid grid-cols-2 gap-2 ">
                    <!-- Kategori -->
                    <div>
                        <label class="text-gray-600 text-[14px] block my-3">Kategori</label>
                        <select name="category_id" class="w-full px-4 py-2 text-sm bg-white border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>

                    </div>

                    <!-- Brand -->
                    <div>
                        <label class="text-gray-600 text-[14px] block my-3">Brand</label>
                        <select name="brand_id"
                            class="w-full px-4 py-2 text-sm bg-white border border-gray-400 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500">
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                            @endforeach
                        </select>

                    </div>

                </div>
                <!-- Gambar -->
                <div>
                    <label class="text-gray-600 text-[14px] block my-3">Gambar</label>
                    <input type="file" name="images" class="w-full px-4 py-2 text-sm bg-transparent bg-white border border-gray-400 rounded file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200" accept="image/*">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="text-gray-600 text-[14px] block my-3">Deskripsi</label>
                    <textarea type="text" name="description" rows="4" class="w-full px-4 py-2 text-sm bg-transparent border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"></textarea>
                </div>

                <!-- Harga -->
                <div>
                    <label class="text-gray-600 text-[14px] block my-3">Harga</label>
                    <input type="number" name="price" step="1" class="w-full px-4 py-2 text-sm bg-transparent border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>
                <div>
                    <label class="text-gray-600 text-[14px] block my-3">Stok</label>
                    <input type="number" name="stoks" step="1" class="px-4 py-2 text-sm bg-transparent border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>
                <!-- Status -->
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Status Produk</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_active" value="1" class="text-blue-600 border-gray-400 rounded bg-tran text-smsparent focus:ring-blue-500">
                            <span class="ml-2 text-gray-700">Aktif</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_features" value="1" class="text-blue-600 border-gray-400 rounded bg-tran text-smsparent focus:ring-blue-500">
                            <span class="ml-2 text-gray-700">Ditampilkan</span>
                        </label>
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex justify-center gap-2 pt-4">
                    <button type="submit" class="px-6 py-2 font-semibold text-white transition bg-green-600 rounded hover:bg-gray-700">
                        Simpan Produk
                    </button>
                    <button type="submit" class="px-6 py-2 font-semibold text-white transition bg-red-600 rounded hover:bg-gray-700">
                        Delete Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>