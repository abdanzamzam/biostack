<button {{ $attributes->merge(["type" => "button", "class" => "inline-flex items-center px-5 py-2.5 bg-white/10 text-white rounded-xl font-medium hover:bg-white/20 transition-all duration-200"]) }}>
    {{ $slot }}
</button>
