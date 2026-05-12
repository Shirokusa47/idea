@props(['href' => null])

@if($href)
    <a href="{{ $href }}" {{ $attributes->class(['border rounded-xl bg-card p-4 text-sm block']) }}>
        {{ $slot }}
    </a>
@else
    <div {{ $attributes->class(['border rounded-xl bg-card p-4 text-sm block']) }}>
        {{ $slot }}
    </div>
@endif
