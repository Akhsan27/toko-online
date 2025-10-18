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

<body class="">
    @include('admin.header')
    @include('admin.sidebar')
    <div class="sm:ml-64 mt-[55px]">
        <div class="pt-4 border-2 border-gray-700 rounded-lg xl:px-5">
            <div class="relative z-10 overflow-x-auto rounded-md shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="text-center text-white uppercase bg-gray-500 text-xm">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Detail Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                HARGA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                AKSI
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr class="text-center text-black transition duration-150 border-b border-gray-200 odd:bg-gray-200 even:bg-gray-100 hover:border-gray-500">
                            <!-- Nama Produk -->
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $item->name }}
                            </td>
                            <!-- Gambar Produk -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $item -> image_url}}"
                                        alt="{{ $item->name }}"
                                        class="object-cover w-16 h-16 border rounded-md shadow-md" />
                                </div>
                            </td>

                            <!-- Kategori -->
                            <td class="px-6 py-4">
                                {{ $item->category->name ?? '-' }}
                            </td>

                            <!-- Harga -->
                            <td class="px-6 py-4">
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </td>

                            <!-- Tombol Aksi -->
                            <td class="px-6 py-4 text-center ">
                                <div class="flex justify-center gap-2 w-[80px]">
                                    <!-- Tombol Edit -->
                                    <a class="px-3 py-1 text-white transition-transform duration-200 ease-in-out bg-yellow-500 rounded hover:bg-yellow-600 hover:scale-110 openEditModal"
                                        data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}"
                                        data-price="{{ $item->price }}"
                                        data-stoks="{{ $item->stoks }}"
                                        data-url="{{ url('/admin/produk') }}">
                                        <img class="w-5" src="{{ asset('asset/edit.svg') }}" alt="Edit">
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.barang.destroy',$item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2 py-2 text-white transition-transform duration-200 ease-in-out bg-red-500 rounded hover:bg-red-600 hover:scale-110">
                                            <img class="w-5" src="{{ asset('asset/delete.svg') }}" alt="Delete">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal Edit -->
                <div id="editModal" class="mt-[55px] fixed inset-0  hidden h-full bg-black bg-opacity-50 sm:ml-64">
                    <div class="flex items-center justify-center w-full h-full ">
                        <div class="p-6 bg-white rounded-lg w-96">
                            <h2 class="mb-4 text-lg font-bold">Edit Produk</h2>
                            <form id="editForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" id="editId">

                                <label class="text-gray-600 text-[14px] block">Nama Barang</label>
                                <input type="text" name="name" id="editName" class="w-full px-4 py-2 text-sm uppercase bg-transparent border border-b-2 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">

                                <label class="text-gray-600 text-[14px] block">Harga</label>
                                <input type="number" name="price" id="editPrice" class="w-full px-4 py-2 text-sm uppercase bg-transparent border border-b-2 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">

                                <label class="text-gray-600 text-[14px] block">Stok</label>
                                <input type="number" name="stoks" id="editStoks" class="w-full px-4 py-2 text-sm uppercase bg-transparent border border-b-2 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">

                                <div class="flex justify-end gap-3 mt-4">
                                    <button type="button" id="closeModal" class="px-6 py-2 font-semibold text-white transition bg-green-600 rounded hover:bg-gray-700">Batal</button>
                                    <button type="submit" class="px-6 py-2 font-semibold text-white transition bg-red-600 rounded hover:bg-gray-700">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('editModal');
        const form = document.getElementById('editForm');

        document.querySelectorAll('.openEditModal').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const price = this.dataset.price;
                const stoks = this.dataset.stoks;
                const base = this.dataset.url; // contoh: /admin/produk

                // isi form
                document.getElementById('editId').value = id;
                document.getElementById('editName').value = name;
                document.getElementById('editPrice').value = price;
                document.getElementById('editStoks').value = stoks;

                // set action (PUT /admin/produk/{id})
                form.action = base + '/' + id;

                modal.classList.remove('hidden');
            });
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        // (opsional) tutup modal kalau klik di luar konten
        modal.addEventListener('click', function(e) {
            if (e.target === modal) modal.classList.add('hidden');
        });
    </script>

</body>

</html>