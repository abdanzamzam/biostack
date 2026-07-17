<button {{ $attributes->merge(["type" => "submit", "class" => "inline-flex items-center px-5 py-2.5 bg-red-500/20 border border-red-500/30 text-red-400 rounded-xl font-medium hover:bg-red-500/30 hover:text-red-300 transition-all duration-200"]) }}>
    {{ $slot }}
</button>
