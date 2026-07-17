<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-white mb-6">Appearance</h2>

    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 md:p-8">
        <form wire:submit="save" class="space-y-6">
            {{-- Page Title --}}
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">Page Title</label>
                <input wire:model="page_title" type="text" placeholder="e.g. My Bio"
                    class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
            </div>

            {{-- Bio --}}
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">Bio</label>
                <textarea wire:model="page_bio" rows="3" placeholder="Tell the world about yourself..."
                    class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all resize-none"></textarea>
            </div>

            {{-- Avatar URL --}}
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">Avatar URL</label>
                <div class="flex items-center gap-4">
                    <input wire:model="page_avatar" type="url" placeholder="https://.../avatar.jpg"
                        class="flex-1 bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
                    @if($page_avatar)
                        <div class="w-12 h-12 rounded-full overflow-hidden shrink-0 border-2 border-white/10">
                            <img src="{{ $page_avatar }}" alt="Preview" class="w-full h-full object-cover" onerror="this.style.display=none" />
                        </div>
                    @endif
                </div>
            </div>

            {{-- Background Type --}}
            <div>
                <label class="block text-sm font-medium text-white/80 mb-2">Background</label>
                <div class="flex gap-2 mb-4">
                    <button type="button" wire:click="$set(bg_type, solid)"
                        class="px-4 py-2 rounded-xl text-sm transition-all {{ $bg_type === solid ? bg-teal-500/20