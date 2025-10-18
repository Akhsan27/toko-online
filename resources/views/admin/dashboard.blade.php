<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard_Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">
    @include('admin.header')
    @include('admin.sidebar')
    <div class=" h-[100px] bg-gray-900 sm:ml-64 mt-[60px] flex pl-5" style="align-items:center">
        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
        </svg>
        <h2 class="text-white text-[20px] ml-3">Dashboard</h2>
    </div>
    <div class="sm:ml-64 mt-[20px]">
           <div class="mt-[10px]">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold tracking-wide text-gray-800">
                    Data Statistik Penjualan
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Ringkasan data barang, penjualan, dan produk populer
                </p>
            </div>
            <div class="flex justify-center rounded-md">
                <!-- Diagram Bundar -->
                <div class="">
                    <!-- Pie Chart: Statistik Toko -->
                    <div class="p-6 rounded-xl">
                        <div class="w-full h-60">
                            <canvas id="storeStats"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-2 p-4 md:grid-cols-3 xl:grid-cols-4 ">
            <div class="text-white text-[20px] bg-gray-200 rounded-md hover:shadow-md duration-300">
                <div class="flex w-full bg-gray-500 h-[50px] justify-center rounded-t-md" style="align-items: center;">
                    <svg class="w-7 h-7 text-red-500 transition duration-75 text-[60px] " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <h1 class="text-white font-semibold text-[20px]">Data Barang</h1>
                </div>
                <div class="text-center">
                    <h2 class="text-[50px] text-gray-700 font-bold">100</h2>
                </div>
            </div>
            <div class="text-white text-[20px] bg-gray-200 rounded-md hover:shadow-md duration-300">
                <div class="flex w-full bg-blue-500 h-[50px] justify-center rounded-t-md" style="align-items: center;">
                    <svg class="w-7 h-7 text-red-500 transition duration-75 text-[60px] " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <h1 class="text-white font-semibold text-[20px]">Penjualan</h1>
                </div>
                <div class="text-center">
                    <h2 class="text-[50px] text-gray-700 font-bold">100</h2>
                </div>
            </div>
            <div class="text-white text-[20px] bg-gray-200 rounded-md hover:shadow-md duration-300">
                <div class="flex w-full bg-green-500 justify-center h-[50px] rounded-t-md" style="align-items: center;">
                    <svg class="w-7 h-7 text-red-500 transition duration-75 text-[60px] " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <h1 class="text-white font-semibold text-[20px]">Popular Produk</h1>
                </div>
                <div class="text-center">
                    <h2 class="text-[50px] text-gray-700 font-bold">100</h2>
                </div>
            </div>
            <div class="text-white text-[20px] bg-gray-200 rounded-md hover:shadow-md duration-300">
                <div class="flex w-full bg-yellow-500 justify-center h-[50px] rounded-t-md" style="align-items: center;">
                    <svg class="w-7 h-7 text-red-500 transition duration-75 text-[60px] " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <h1 class="text-white font-semibold text-[20px]">Data Barang</h1>
                </div>
                <div class="text-center">
                    <h2 class="text-[50px] text-gray-700 font-bold">100</h2>
                </div>
            </div>
        </div>
     
    </div>
    <script>
        // Pie Chart: Statistik Toko
        const ctx = document.getElementById("storeStats").getContext("2d");

        new Chart(ctx, {
            type: "pie",
            data: {
                labels: ["Data Barang", "Penjualan", "Produk Populer"],
                datasets: [{
                    label: "Statistik Toko",
                    data: [400, 80, 40],
                    backgroundColor: ["#3B82F6", "#10B981", "#F97316"],
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: "bottom",
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                                const value = context.raw;
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${context.label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>