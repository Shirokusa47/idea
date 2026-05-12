<x-layout>
    <header>
        <h1>Ideas</h1>
        <p>Track your ideas and projects.</p>
    </header>
    {{-- Fila de pills para filtrar por status --}}
    <div class="flex gap-2 mt-4">

        {{-- Pill para "All" con conteo total --}}
        <a href="{{ route('idea.index') }}"
           class="{{ !request('status') ? 'button' : 'button-outlined' }}">
            All
            <span class="text-xs pl-1">{{ $statusCounts['all'] }}</span>
        </a>

        {{-- Loop sobre todos los statuses con su conteo --}}
        @foreach(\App\IdeaStatus::cases() as $status)
            <a href="{{ route('idea.index', ['status' => $status->value]) }}"
               class="{{ request('status') === $status->value ? 'button' : 'button-outlined' }}">
                {{ $status->label() }}
                <span class="text-xs pl-1">{{ $statusCounts[$status->value] }}</span>
            </a>
        @endforeach

    </div>

    <div class="grid lg:grid-cols-2 gap-4 mt-6">
        @forelse($ideas as $idea)
            <x-card href="{{ route('idea.show', $idea) }}">
                <h3>{{ $idea->title }}</h3>

                <div>
                    {{ $idea->description }}
                </div>

                <x-idea.status-label :status="$idea->status" />

                <div>
                    {{ $idea->created_at->diffForHumans() }}
                </div>
            </x-card>
        @empty
            <p>No ideas yet.</p>
        @endforelse
    </div>
</x-layout>
