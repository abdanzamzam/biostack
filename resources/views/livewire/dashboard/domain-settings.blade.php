<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-white mb-1">Custom Domain</h2>
    <p class="text-white/50 text-sm mb-6">Connect your own domain for your bio page</p>

    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 md:p-8">
        @if(auth()->user()->custom_domain)
            <div class="flex items-center gap-3 mb-6 bg-emerald-500/10 border border-emerald-500/20 rounded-xl px-4 py-3">
                <span class="text-emerald-400 text-lg">✅</span>
                <div>
                    <p class="text-emerald-400 font-medium">Domain connected</p>
                    <p class="text-emerald-400/60 text-sm">{{ auth()->user()->custom_domain }}</p>
                </div>
            </div>
        @endif

        <form wire:submit="saveDomain" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">Your Domain</label>
                <div class="flex gap-3">
                    <input wire:model="custom_domain" type="text" placeholder="bio.yourdomain.com"
                        class="flex-1 bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
                    <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-xl font-medium hover:from-teal-400 hover:to-cyan-500 transition-all shadow-lg shadow-teal-500/25">
                        Save
                    </button>
                </div>
                @error("custom_domain") <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                <p class="text-xs text-white/40 mt-2">Enter your domain name (e.g. bio.yourdomain.com)</p>
            </div>

            @if(auth()->user()->custom_domain)
                <div class="border-t border-white/10 pt-4">
                    <p class="text-sm text-white/60 mb-3">DNS Setup Instructions</p>
                    <div class="bg-white/5 rounded-xl p-4 space-y-2 text-sm">
                        <p class="text-white/80"><span class="text-white/50">Type:</span> <code class="text-teal-400 bg-white/5 px-2 py-0.5 rounded">CNAME</code></p>
                        <p class="text-white/80"><span class="text-white/50">Name:</span> <code class="text-teal-400 bg-white/5 px-2 py-0.5 rounded">@</code> or your subdomain</p>
                        <p class="text-white/80"><span class="text-white/50">Value:</span> <code class="text-teal-400 bg-white/5 px-2 py-0.5 rounded">develop-folder-vision-totals.trycloudflare.com</code></p>
                    </div>
                </div>

                <button type="button" wire:click="removeDomain" wire:confirm="Remove domain? This will disconnect your custom domain."
                    class="text-sm text-red-400 hover:text-red-300 transition-colors">
                    Remove domain
                </button>
            @endif
        </form>
    </div>

    <div x-data="{ show: false }" x-on:domain-saved.window="show = true; setTimeout(() => show = false, 3000)" x-show="show" x-transition class="fixed bottom-6 right-6 bg-emerald-500 text-white px-6 py-3 rounded-xl shadow-lg">
        Domain saved ✓
    </div>
    <div x-data="{ show: false }" x-on:domain-removed.window="show = true; setTimeout(() => show = false, 3000)" x-show="show" x-transition class="fixed bottom-6 right-6 bg-red-500 text-white px-6 py-3 rounded-xl shadow-lg">
        Domain removed
    </div>
</div>
