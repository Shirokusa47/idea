<x-layout>
    <h1>{{ $idea->title }}</h1>
    <p>{{ $idea->description }}</p>
    <x-idea.status-label :status="$idea->status" />
</x-layout>
