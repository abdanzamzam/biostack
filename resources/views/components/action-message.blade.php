@props(["on"])

<div x-data="{ shown: false, timeout: null }"
     x-init="@this.on("{{ $on }}", () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms
     style="display: none;"
    {{ $attributes->merge(["class" => "text-sm text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 rounded-xl px-4 py-3"]) }}>
    {{ $slot->isEmpty() ? __("Saved.") : $slot }}
</div>
