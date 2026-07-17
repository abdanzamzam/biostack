<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-white">Analytics</h2>
        <div class="flex gap-1 bg-white/5 rounded-xl p-1">
            <button wire:click="setPeriod(&apos;7d&apos;)"
                class="px-4 py-1.5 text-sm rounded-lg transition-all {{ $period === "7d" ? "bg-white/10 text-white" : "text-white/50 hover:text-white" }}">7d</button>
            <button wire:click="setPeriod(&apos;30d&apos;)"
                class="px-4 py-1.5 text-sm rounded-lg transition-all {{ $period === "30d" ? "bg-white/10 text-white" : "text-white/50 hover:text-white" }}">30d</button>
            <button wire:click="setPeriod(&apos;90d&apos;)"
                class="px-4 py-1.5 text-sm rounded-lg transition-all {{ $period === "90d" ? "bg-white/10 text-white" : "text-white/50 hover:text-white" }}">90d</button>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="bg-white/5 border border-white/10 rounded-xl p-5">
            <p class="text-sm text-white/60 mb-1">Total Page Views</p>
            <p class="text-3xl font-bold text-white">{{ number_format($totalViews) }}</p>
        </div>
        <div class="bg-white/5 border border-white/10 rounded-xl p-5">
            <p class="text-sm text-white/60 mb-1">Total Link Clicks</p>
            <p class="text-3xl font-bold text-white">{{ number_format($totalClicks) }}</p>
        </div>
    </div>

    {{-- Bar Chart --}}
    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 mb-6">
        <h3 class="text-white font-semibold mb-4">
            @if($period === "7d") Last 7 Days
            @elseif($period === "30d") Last 30 Days
            @else Last 90 Days
            @endif
        </h3>

        @if(count($views) > 0 && max($views) > 0)
            @php
                $maxVal = max(max($views), max($clicks), 1);
            @endphp
            <div class="space-y-1">
                {{-- Views bars --}}
                <div class="flex items-center gap-1 text-xs text-white/40 mb-1">
                    <span class="w-10 shrink-0">Views</span>
                    <div class="flex-1 flex items-end gap-[2px] h-16">
                        @foreach($views as $i => $v)
                            <div class="flex-1 bg-teal-500/50 rounded-t-sm transition-all duration-300"
                                 style="height: {{ max(4, ($v / $maxVal) * 100) }}%"
                                 title="{{ $v }} views"></div>
                        @endforeach
                    </div>
                </div>
                {{-- Clicks bars --}}
                <div class="flex items-center gap-1 text-xs text-white/40">
                    <span class="w-10 shrink-0">Clicks</span>
                    <div class="flex-1 flex items-end gap-[2px] h-16">
                        @foreach($clicks as $i => $v)
                            <div class="flex-1 bg-cyan-500/50 rounded-t-sm transition-all duration-300"
                                 style="height: {{ max(4, ($v / $maxVal) * 100) }}%"
                                 title="{{ $v }} clicks"></div>
                        @endforeach
                    </div>
                </div>
                {{-- Date labels --}}
                <div class="flex gap-[2px] ml-10">
                    @foreach($views as $i => $v)
                        <div class="flex-1 text-[8px] text-white/30 text-center truncate">
                            @if($i % 5 === 0 || $i === count($views) - 1)
                                {{ \Carbon\Carbon::now()->subDays((count($views)-1-$i))->format("M j") }}
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex gap-4 mt-4 text-xs text-white/50">
                <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-sm bg-teal-500/50"></span> Page Views</span>
                <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-sm bg-cyan-500/50"></span> Link Clicks</span>
            </div>
        @else
            <div class="text-center py-12 text-white/40">
                <div class="text-4xl mb-3">&#128202;</div>
                <p>No data yet. Share your bio page to start collecting analytics!</p>
            </div>
        @endif
    </div>

    {{-- Top Links --}}
    <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
        <h3 class="text-white font-semibold mb-4">Top Performing Links</h3>
        @if(count($topLinks) > 0)
            <div class="space-y-2">
                @foreach($topLinks as $link)
                    <div class="flex items-center justify-between py-2 border-b border-white/5 last:border-0">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="text-white/40 text-sm">#{{ $loop->iteration }}</span>
                            <span class="text-white truncate">{{ $link["title"] }}</span>
                        </div>
                        <span class="text-white/60 text-sm shrink-0 ml-4">{{ number_format($link["total_clicks"] ?? 0) }} clicks</span>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-white/40 text-sm text-center py-4">No links clicked yet</p>
        @endif
    </div>
</div>
