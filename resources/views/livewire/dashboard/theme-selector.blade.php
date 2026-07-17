<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-white mb-1">Themes</h2>
    <p class="text-white/50 text-sm mb-6">Choose a theme for your bio page</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($themes as $theme)
            <div class="relative group cursor-pointer" wire:click="selectTheme({{ $theme->id }})">
                {{-- Theme Preview Card --}}
                <div class="rounded-2xl overflow-hidden border-2 transition-all duration-200 {{ $currentThemeId === $theme->id ? "border-teal-500 shadow-lg shadow-teal-500/20" : "border-white/10 hover:border-white/20" }}">
                    {{-- Preview --}}
                    <div class="h-48 p-5 flex flex-col items-center justify-center"
                         style="background: linear-gradient(135deg, {{ $theme->config["css_vars"]["--bg-start"] }}, {{ $theme->config["css_vars"]["--bg-end"] }})">
                        <div class="w-10 h-10 rounded-full bg-white/20 mb-2 {{ $theme->config["avatar"] === "rounded" ? "rounded-lg" : "" }}"></div>
                        <div class="h-3 w-24 rounded bg-white/20 mb-2"></div>
                        <div class="h-2 w-32 rounded bg-white/10 mb-3"></div>
                        <div class="flex flex-col gap-1.5 w-full px-4">
                            <div class="h-8 rounded {{ $theme->config["card_radius"] }} bg-white/10 border border-white/10"></div>
                            <div class="h-8 rounded {{ $theme->config["card_radius"] }} bg-white/10 border border-white/10"></div>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="p-4 bg-[#0b0f19] flex items-center justify-between">
                        <div>
                            <h3 class="font-semibold text-white">{{ $theme->name }}</h3>
                            @if($theme->is_premium)
                                <span class="text-[10px] px-2 py-0.5 rounded-full bg-amber-500/20 text-amber-400 font-medium">PRO</span>
                            @else
                                <span class="text-xs text-white/40">Free</span>
                            @endif
                        </div>
                        @if($currentThemeId === $theme->id)
                            <span class="text-teal-400 text-sm font-medium">Active &#10003;</span>
                        @elseif($theme->is_premium)
                            <span class="text-white/30 text-xs">&#128274;</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div x-data="{ show: false }"
         x-on:theme-requires-pro.window="show = true; setTimeout(() => show = false, 3000)"
         x-show="show" x-transition
         class="fixed bottom-6 right-6 bg-amber-500 text-amber-900 px-6 py-3 rounded-xl shadow-lg font-medium">
        &#11088; Premium themes require the Pro plan
    </div>

    <div x-data="{ show: false }"
         x-on:theme-applied.window="show = true; setTimeout(() => show = false, 3000)"
         x-show="show" x-transition
         class="fixed bottom-6 right-6 bg-emerald-500 text-white px-6 py-3 rounded-xl shadow-lg">
        Theme applied &#10003;
    </div>
</div>
