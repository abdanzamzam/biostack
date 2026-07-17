@props(["href" => "#"])

<a {{ $attributes->merge(["class" => "block px-4 py-2.5 text-sm text-white/70 hover:text-white hover:bg-white/5 transition-colors"]) }}>
    {{ $slot }}
</a>
