<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="flex items-center justify-center w-full h-screen bg-gray-500">
        <div class="grid w-[80%] max-4xl shadow-lg md:grid-cols-2 h-[400px] shadow-gray-600 bg-white rounded-lg">
            <div class="w-full col-span-1 p-8 bg-white shadow-lg rounded-s-2xl">
                <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500 " name="remember">
                            <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="block mt-4">

                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('register') }}" class="text-gray-300 underline hover:text-blue-400"> Alredy Login form</a>

                        <div>
                            @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                            <x-primary-button class="ms-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="relative hidden p-8 text-white shadow-lg md:flex lg:flex sm:hidden">
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