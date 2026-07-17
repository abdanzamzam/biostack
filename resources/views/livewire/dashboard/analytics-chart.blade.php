<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-white">Analytics</h2>
        <div class="flex gap-1 bg-white/5 rounded-xl p-1">
            <button wire:click="setPeriod('7d')"
                class="px-4 py-1.5 text-sm rounded-lg transition-all {{ $period === 7d ? bg-white/10