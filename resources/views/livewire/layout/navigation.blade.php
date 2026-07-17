<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
};
?>

<nav x-data="{ open: false }" class="bg-[#0b0f19]/80 border-b border-white/10 backdrop-blur-xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="/" wire:navigate class="flex items-center gap-2">
                        <span class="text-xl font-bold bg-gradient-to-r from-teal-400 to-cyan-400 bg-clip-text text-transparent">BioStack</span>
                    </a>
                </div>

                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate
                       class="px-4 py-2 text-sm rounded-lg transition-colors {{ request()->routeIs('dashboard') && !request()->routeIs('dashboard.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                        📊 Stats
                    </a>
                    <a href="{{ route('dashboard.links') }}" wire:navigate
                       class="px-4 py-2 text-sm rounded-lg transition-colors {{ request()->routeIs('dashboard.links*') ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                        🔗 Links
                    </a>
                    <a href="{{ route('dashboard.appearance') }}" wire:navigate
                       class="px-4 py-2 text-sm rounded-lg transition-colors {{ request()->routeIs('dashboard.appearance*') ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                        🎨 Appearance
                    </a>
                    <a href="{{ route('dashboard.themes') }}" wire:navigate
                       class="px-4 py-2 text-sm rounded-lg transition-colors {{ request()->routeIs('dashboard.themes*') ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                        🎭 Themes
                    </a>
                    <a href="{{ route('dashboard.analytics') }}" wire:navigate
                       class="px-4 py-2 text-sm rounded-lg transition-colors {{ request()->routeIs('dashboard.analytics*') ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                        📈 Analytics
                    </a>
                    <a href="{{ route('dashboard.domain') }}" wire:navigate
                       class="px-4 py-2 text-sm rounded-lg transition-colors {{ request()->routeIs('dashboard.domain*') ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                        🌐 Domain
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-2">
                <a href="/demo" target="_blank" class="px-3 py-1.5 text-xs text-white/60 hover:text-white border border-white/10 rounded-lg transition-colors">
                    View Bio
                </a>
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 text-sm text-white/80 hover:text-white rounded-lg hover:bg-white/5 transition-colors">
                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-teal-400 to-cyan-500 flex items-center justify-center text-xs font-bold text-black">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <span>{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-[#161b2e] border border-white/10 rounded-xl shadow-2xl py-1 z-50">
                        <a href="{{ route('dashboard.settings') }}" wire:navigate class="block px-4 py-2.5 text-sm text-white/70 hover:text-white hover:bg-white/5 transition-colors">
                            ⚙️ Settings
                        </a>
                        <hr class="border-white/5 my-1">
                        <button wire:click="logout" class="w-full text-start px-4 py-2.5 text-sm text-red-400 hover:text-red-300 hover:bg-white/5 transition-colors">
                            🚪 Log Out
                        </button>
                    </div>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="p-2 rounded-lg text-white/60 hover:text-white hover:bg-white/5 transition-colors">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden border-t border-white/10">
        <div class="pt-2 pb-3 space-y-1 px-3">
            <a href="{{ route('dashboard') }}" wire:navigate class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('dashboard') && !request()->routeIs('dashboard.*') ? 'bg-white/10 text-white' : 'text-white/60' }}">📊 Stats</a>
            <a href="{{ route('dashboard.links') }}" wire:navigate class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('dashboard.links*') ? 'bg-white/10 text-white' : 'text-white/60' }}">🔗 Links</a>
            <a href="{{ route('dashboard.appearance') }}" wire:navigate class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('dashboard.appearance*') ? 'bg-white/10 text-white' : 'text-white/60' }}">🎨 Appearance</a>
            <a href="{{ route('dashboard.themes') }}" wire:navigate class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('dashboard.themes*') ? 'bg-white/10 text-white' : 'text-white/60' }}">🎭 Themes</a>
            <a href="{{ route('dashboard.analytics') }}" wire:navigate class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('dashboard.analytics*') ? 'bg-white/10 text-white' : 'text-white/60' }}">📈 Analytics</a>
            <a href="{{ route('dashboard.domain') }}" wire:navigate class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('dashboard.domain*') ? 'bg-white/10 text-white' : 'text-white/60' }}">🌐 Domain</a>
            <a href="{{ route('dashboard.settings') }}" wire:navigate class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('dashboard.settings*') ? 'bg-white/10 text-white' : 'text-white/60' }}">⚙️ Settings</a>
        </div>
        <div class="pt-3 pb-2 border-t border-white/10 px-3">
            <button wire:click="logout" class="w-full text-start px-3 py-2 text-sm text-red-400">🚪 Log Out</button>
        </div>
    </div>
</nav>
