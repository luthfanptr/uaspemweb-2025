<x-layouts.app>
    <div class="container my-5">
        <h2>{{ $film->title }}</h2>

        @if ($film->poster)
            <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}" class="img-fluid mb-4" style="max-width: 300px;">
        @endif

        <p><strong>Directed by:</strong> {{ $film->director }}</p>
        <p><strong>Year:</strong> {{ $film->release_year }}</p>
        <p><strong>Synopsis:</strong> {{ $film->synopsis }}</p>

        <hr>
        <h4>Reviews</h4>
        @livewire('review-form', ['filmId' => $film->id])
        @forelse ($film->reviews as $review)
            <div class="mb-3">
                <strong>{{ $review->user->name }}</strong> - ⭐ {{ $review->rating }}<br>
                <p>{{ $review->comment }}</p>
            </div>
        @empty
            <p>No reviews yet.</p>
        @endforelse
    </div>
</x-layouts.app>
