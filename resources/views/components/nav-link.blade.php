@props(["active"])

@php
$classes = ($active ?? false)
            ? "inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-white/10 rounded-xl transition-colors"
            : "inline-flex items-center px-4 py-2 text-sm font-medium text-white/60 hover:text-white hover:bg-white/5 rounded-xl transition-colors";
@endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    {{ $slot }}
</a>
