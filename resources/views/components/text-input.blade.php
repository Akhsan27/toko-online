@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-0 border-b border-gray-800 focus:border-gray-600 focus:rounded-md  rounded-none shadow-none bg-transparent']) }}>