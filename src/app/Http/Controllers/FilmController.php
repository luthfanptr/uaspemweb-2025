<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function show(Film $film)
    {
        $film->load('reviews.user');

        return view('film.show', compact('film'));
    }
}
