@props(['status' => \App\IdeaStatus::Pending])

@php
    $classes = match($status) {
        \App\IdeaStatus::Pending => 'bg-yellow-500/10 text-yellow-500 border-yellow-500/20',
        \App\IdeaStatus::InProgress => 'bg-blue-500/10 text-blue-500 border-blue-500/20',
        \App\IdeaStatus::Completed => 'bg-green-500/10 text-green-500 border-green-500/20',
    };
@endphp

<span class="inline-block rounded-full text-xs font-medium border px-2 py-0.5 mt-1 {{ $classes }}">
    {{ $status->label() }}
</span>
