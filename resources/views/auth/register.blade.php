<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Register</title>
</head>

<body>
    <div class="flex items-center justify-center w-full h-screen bg-gray-500 ">
        <div class="grid  w-[80%] max-4xl shadow-lg md:grid-cols-2 shadow-gray-600 bg-white rounded-lg">
            <div class="w-full col-span-1 p-8 bg-white shadow-lg rounded-s-2xl">
                <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Register</h2>
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Action -->
                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">Already registered?</a>
                        <x-primary-button>
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class="relative hidden p-8 text-white shadow-lg md:flex lg:flex sm:hidden ">
                <!-- Gambar background -->
                <img src="{{ asset('images/background/register.png') }}"
                    alt="Background"
                    class="absolute inset-0 object-cover w-full h-full ">

                <!-- Overlay warna biar teks lebih jelas -->
                <div class="absolute inset-0 rounded-l-lg bg-black/10"></div>
                <!-- Konten teks -->
                <div class="relative z-10 flex flex-col items-start justify-end w-full">
                    <h1 class="mb-4 text-3xl font-bold">Hello, welcome!</h1>
                    <p class="mb-6 text-sm">Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                    <button class="px-4 py-2 text-blue-600 bg-white rounded shadow">
                        View more
                    </button>
                </div>
            </div>
        </div>

    </div>


</body>

</html>