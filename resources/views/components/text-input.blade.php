@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all']) }}>
