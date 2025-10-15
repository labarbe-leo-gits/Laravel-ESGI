@props([
    'active' => false,
])
<a {{ $attributes->class([
        'px-2 pt-1 rounded',
        'bg-shade-100' => !$active,
        'bg-blue-700 text-white' => $active,
    ]) }}
>
    {{ $slot }}
</a>
