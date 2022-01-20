<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Http\Requests\AddFilmsToActorRequest;
use App\Http\Resources\ActorResource;
use App\Models\Actor;

class ActorsController extends Controller
{
    public function index()
    {
        $actors = Actor::query()->with('films')->orderByDesc('id')->paginate(15);

        return ActorResource::collection($actors);
    }

    public function show(Actor $actor): ActorResource
    {
        return new ActorResource($actor->load('films'));
    }

    public function create(ActorRequest $request): ActorResource
    {
        $actor = new Actor();
        $actor->fill($request->validated());
        $actor->save();
        $actor->load('films');

        return new ActorResource($actor);
    }

    public function update(ActorRequest $request, Actor $actor): ActorResource
    {
        $actor->fill($request->validated());
        $actor->save();
        $actor->load('films');

        return new ActorResource($actor);
    }

    public function delete(Actor $actor)
    {
        $actor->delete();
    }

    public function films(AddFilmsToActorRequest $request, Actor $actor): ActorResource
    {
        $actor->films()->sync($request->films);
        $actor->save();
        $actor->load('films');

        return new ActorResource($actor);
    }
}
