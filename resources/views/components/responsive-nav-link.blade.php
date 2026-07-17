@props(["active"])

@php
$classes = ($active ?? false)
            ? "block w-full text-start px-4 py-2.5 text-sm font-medium text-white bg-white/10 rounded-lg transition-colors"
            : "block w-full text-start px-4 py-2.5 text-sm font-medium text-white/60 hover:text-white hover:bg-white/5 rounded-lg transition-colors";
@endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    {{ $slot }}
</a>
