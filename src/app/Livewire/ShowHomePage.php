<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;

class ShowHomePage extends Component
{
    public function render()
    {
        return view('livewire.show-home-page', [
            'films' => Film::latest()->get()
        ]);
    }
}
