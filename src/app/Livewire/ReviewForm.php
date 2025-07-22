<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewForm extends Component
{
    public $filmId;
    public $rating;
    public $comment;

    public function submit()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Review::create([
            'film_id' => $this->filmId,
            'user_id' => Auth::id(),
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);

        session()->flash('success', 'Review berhasil ditambahkan!');
        $this->reset('rating', 'comment');
        $this->dispatch('reviewAdded');
    }

    public function render()
    {
        return view('livewire.review-form');
    }
}
