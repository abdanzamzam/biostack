<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-white mb-1">Themes</h2>
    <p class="text-white/50 text-sm mb-6">Choose a theme for your bio page</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($themes as $theme)
            <div class="relative group cursor-pointer" wire:click="selectTheme({{ $theme->id }})">
                {{-- Theme Preview Card --}}
                <div class="rounded-2xl overflow-hidden border-2 transition-all duration-200 {{ $currentThemeId === $theme->id ? border-teal-500