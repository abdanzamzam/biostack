@props(["width" => "48", "alignment" => "left"])

@php
$alignClass = $alignment === "right" ? "right-0" : "left-0";
$widthClass = $width === "48" ? "w-48" : "w-56";
@endphp

<div x-data="{ open: false }" x-on:keydown.escape.window="open = false" class="relative">
    <div x-on:click="open = !open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-on:click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute {{ $alignClass }} mt-2 {{ $widthClass }} bg-[#161b2e] border border-white/10 rounded-xl shadow-2xl py-1 z-50" x-cloak>
        {{ $content }}
    </div>
</div>
