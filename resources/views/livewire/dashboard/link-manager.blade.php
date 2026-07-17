<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-white">Manage Links</h2>
        <button
            wire:click="createLink"
            class="px-5 py-2.5 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-xl font-medium hover:from-teal-400 hover:to-cyan-500 transition-all duration-200 shadow-lg shadow-teal-500/25"
        >
            + Add Link
        </button>
    </div>

    @if($showForm)
        <div class="mb-6">
            @livewire('dashboard.link-form', ['linkId' => $editingLinkId], key('link-form-' . ($editingLinkId ?? 'new')))
        </div>
    @endif

    <div class="space-y-3">
        @forelse($links as $link)
            <div class="bg-white/5 border border-white/10 rounded-xl p-4 flex items-center gap-4 group hover:border-white/20 transition-all duration-200 {{ $confirmingDelete === $link->id ? 'opacity-50' : '' }}">
                {{-- Drag handle --}}
                <div class="flex flex-col gap-1 opacity-20 group-hover:opacity-100 transition-opacity">
                    <button wire:click="moveUp({{ $link->id }})" class="text-white/60 hover:text-white" title="Move up">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                    </button>
                    <button wire:click="moveDown({{ $link->id }})" class="text-white/60 hover:text-white" title="Move down">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                </div>

                {{-- Type badge --}}
                <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-lg shrink-0">
                    @switch($link->type)
                        @case('link') 🔗 @break
                        @case('social') 🌐 @break
                        @case('image') 🖼️ @break
                        @case('text') 📝 @break
                        @case('divider') ➖ @break
                        @default 🔗
                    @endswitch
                </div>

                {{-- Link info --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2">
                        <span class="font-medium text-white truncate">{{ $link->title }}</span>
                        @if(!$link->is_active)
                            <span class="text-[10px] px-2 py-0.5 rounded-full bg-gray-500/20 text-gray-400">Draft</span>
                        @endif
                    </div>
                    @if($link->url)
                        <p class="text-sm text-white/60 truncate">{{ $link->url }}</p>
                    @endif
                    <p class="text-xs text-white/40 mt-0.5">#{{ $link->sort_order }} · {{ $link->click_count ?? 0 }} clicks</p>
                </div>

                {{-- Active toggle --}}
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" wire:click="toggleActive({{ $link->id }})" {{ $link->is_active ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-9 h-5 bg-white/10 rounded-full peer peer-checked:bg-teal-500 peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                </label>

                {{-- Actions --}}
                <div class="flex gap-1">
                    <button wire:click="editLink({{ $link->id }})" class="p-2 text-white/40 hover:text-white transition-colors" title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </button>
                    <button wire:click="confirmDelete({{ $link->id }})" class="p-2 text-white/40 hover:text-red-400 transition-colors" title="Delete">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>

                {{-- Delete confirmation --}}
                @if($confirmingDelete === $link->id)
                    <div class="absolute inset-0 bg-black/60 rounded-xl flex items-center justify-center gap-3">
                        <span class="text-sm text-white/80">Delete this link?</span>
                        <button wire:click="deleteLink({{ $link->id }})" class="px-3 py-1.5 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600 transition-colors">Delete</button>
                        <button wire:click="cancelDelete" class="px-3 py-1.5 bg-white/10 text-white text-sm rounded-lg hover:bg-white/20 transition-colors">Cancel</button>
                    </div>
                @endif
            </div>
        @empty
            <div class="text-center py-16">
                <div class="text-5xl mb-4">🔗</div>
                <h3 class="text-xl font-semibold text-white mb-2">No links yet</h3>
                <p class="text-white/60 mb-6">Add your first link to get started</p>
                <button wire:click="createLink" class="px-6 py-3 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-xl font-medium hover:from-teal-400 hover:to-cyan-500 transition-all">+ Add Your First Link</button>
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $links->links(data: ['scrollTo' => false]) }}
    </div>

    {{-- Link Deleted Success Toast --}}
    <div x-data="{ show: false }"
         x-on:link-deleted.window="show = true; setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition
         class="fixed bottom-6 right-6 bg-emerald-500 text-white px-6 py-3 rounded-xl shadow-lg"
    >
        Link deleted successfully ✓
    </div>
</div>
