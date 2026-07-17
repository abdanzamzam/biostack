<button {{ $attributes->merge(["type" => "submit", "class" => "inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-xl font-medium hover:from-teal-400 hover:to-cyan-500 transition-all duration-200 shadow-lg shadow-teal-500/25"]) }}>
    {{ $slot }}
</button>
