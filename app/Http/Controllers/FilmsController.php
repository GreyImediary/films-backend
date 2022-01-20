<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAuthorsToFilmRequest;
use App\Http\Requests\FilmRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\Response;

class FilmsController extends Controller
{
    public function index()
    {
        $films = Film::query()->with('actors')->orderByDesc('id')->paginate(15);

        return FilmResource::collection($films);
    }

    public function show(Film $film): FilmResource
    {
        return new FilmResource($film->load('actors'));
    }

    public function create(FilmRequest $request): FilmResource
    {
        $film = new Film();
        $film->fill($request->validated());
        $film->save();
        $film->load('actors');

        return new FilmResource($film);
    }

    public function update(FilmRequest $request, Film $film)
    {
        $film->fill($request->validated());
        $film->save();
        $film->load('actors');

        return new FilmResource($film);
    }

    public function delete(Film $film): Response
    {
        $film->delete();

        return response()->noContent();
    }

    public function actors(AddAuthorsToFilmRequest $request, Film $film): FilmResource
    {
        $film->actors()->sync($request->actors);
        $film->save();
        $film->load('actors');

        return new FilmResource($film);
    }
}
