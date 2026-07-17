<div class="bg-white/5 border border-white/10 rounded-2xl p-6 md:p-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-white">
            {{ $linkId ? 'Edit Link' : 'Add New Link' }}
        </h3>
        <button wire:click="cancel" class="text-white/40 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <form wire:submit="save" class="space-y-5">
        {{-- Link Type --}}
        <div>
            <label class="block text-sm font-medium text-white/80 mb-1.5">Link Type</label>
            <select wire:model.live="type" class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
                @foreach($linkTypes as $val => $label)
                    <option value="{{ $val }}" class="bg-gray-900">{{ $label }}</option>
                @endforeach
            </select>
            @error('type') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Title (hidden for divider) --}}
        @if($type !== 'divider')
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">Title</label>
                <input wire:model="title" type="text" placeholder="e.g. My Portfolio" class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
                @error('title') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        @endif

        {{-- URL (for link & social) --}}
        @if(in_array($type, ['link', 'social']))
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">URL</label>
                <input wire:model="url" type="url" placeholder="https://..." class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
                @error('url') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        @endif

        {{-- Icon (for social) --}}
        @if($type === 'social')
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">Icon (emoji or URL)</label>
                <input wire:model="icon" type="text" placeholder="e.g. 🐦 or https://.../icon.svg" class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
                @error('icon') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        @endif

        {{-- Content (for text type) --}}
        @if($type === 'text')
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">Content</label>
                <textarea wire:model="content" rows="3" placeholder="Write your text content..." class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all resize-none"></textarea>
                @error('content') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        @endif

        {{-- Image URL (for image type) --}}
        @if($type === 'image')
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">Image URL</label>
                <input wire:model="image" type="text" placeholder="https://..." class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-white/30 focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
                @error('image') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        @endif

        {{-- Schedule --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">Start Date (optional)</label>
                <input wire:model="starts_at" type="datetime-local" class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-white/80 mb-1.5">End Date (optional)</label>
                <input wire:model="ends_at" type="datetime-local" class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:border-teal-500 focus:ring-teal-500/20 focus:ring-2 outline-none transition-all">
            </div>
        </div>
        @error('ends_at') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror

        {{-- Active toggle --}}
        <label class="flex items-center gap-3 cursor-pointer">
            <input wire:model="is_active" type="checkbox" class="rounded bg-white/10 border-white/20 text-teal-500 focus:ring-teal-500/30">
            <span class="text-sm text-white/80">Active (visible on bio page)</span>
        </label>

        {{-- Actions --}}
        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-xl font-medium hover:from-teal-400 hover:to-cyan-500 transition-all duration-200 shadow-lg shadow-teal-500/25">
                {{ $linkId ? 'Update Link' : 'Add Link' }}
            </button>
            <button type="button" wire:click="cancel" class="px-6 py-2.5 bg-white/10 text-white rounded-xl font-medium hover:bg-white/20 transition-all duration-200">
                Cancel
            </button>
        </div>
    </form>
</div>
