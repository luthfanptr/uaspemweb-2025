<div>
    @auth
        <form wire:submit.prevent="submit">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="mb-3">
                <label for="rating">     (1-5)</label>
                <select wire:model="rating" class="form-control" required>
                    <option value="">Rate</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                @error('rating') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="comment">Comment</label>
                <textarea wire:model="comment" class="form-control" rows="3"></textarea>
                @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    @else
        <p><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a> to submit a review.</p>
    @endauth
</div>
