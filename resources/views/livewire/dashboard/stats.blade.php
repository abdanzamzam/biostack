<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white/5 border border-white/10 rounded-xl p-5">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-lg bg-teal-500/20 flex items-center justify-center">
                    <span class="text-lg">🔗</span>
                </div>
                <span class="text-sm text-white/60">Total Links</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ $totalLinks }}</p>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-xl p-5">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center">
                    <span class="text-lg">✅</span>
                </div>
                <span class="text-sm text-white/60">Active</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ $activeLinks }}</p>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-xl p-5">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center">
                    <span class="text-lg">👁️</span>
                </div>
                <span class="text-sm text-white/60">Page Views</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ number_format($totalViews) }}</p>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-xl p-5">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center">
                    <span class="text-lg">👆</span>
                </div>
                <span class="text-sm text-white/60">Link Clicks</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ number_format($totalClicks) }}</p>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 md:p-8">
        <h3 class="text-lg font-semibold text-white mb-4">Quick Actions</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('dashboard.links') }}" wire:navigate class="flex items-center gap-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl p-5 transition-all group">
                <div class="w-12 h-12 rounded-xl bg-teal-500/20 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">🔗</div>
                <div>
                    <p class="font-medium text-white">Manage Links</p>
                    <p class="text-sm text-white/60">Add, edit, reorder your links</p>
                </div>
            </a>

            <a href="{{ route('dashboard.appearance') }}" wire:navigate class="flex items-center gap-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl p-5 transition-all group">
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">🎨</div>
                <div>
                    <p class="font-medium text-white">Appearance</p>
                    <p class="text-sm text-white/60">Customize your bio page look</p>
                </div>
            </a>

            <a href="{{ route('dashboard.themes') }}" wire:navigate class="flex items-center gap-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl p-5 transition-all group">
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">🎭</div>
                <div>
                    <p class="font-medium text-white">Themes</p>
                    <p class="text-sm text-white/60">Choose from 5 ready-made themes</p>
                </div>
            </a>
        </div>
    </div>

    {{-- Bio Preview --}}
    <div class="mt-6 bg-white/5 border border-white/10 rounded-2xl p-6 md:p-8">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-white">Your Bio Page</h3>
                <p class="text-sm text-white/60 mt-1">https://develop-folder-vision-totals.trycloudflare.com/demo</p>
            </div>
            <a href="/demo" target="_blank" class="px-5 py-2.5 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-xl font-medium hover:from-teal-400 hover:to-cyan-500 transition-all text-sm">
                View Live →
            </a>
        </div>
    </div>
</div>
