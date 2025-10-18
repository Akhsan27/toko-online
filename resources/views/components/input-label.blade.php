@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-800 label-custom']) }}>
    {{ $value ?? $slot }}
</label>
