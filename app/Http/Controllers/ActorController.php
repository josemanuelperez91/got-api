<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Actor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $character = Actor::create($request->all());
        return response()->json($character, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \App\Models\Actor
     */
    public function show(Actor $actor)
    {
        return $actor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Actor $actor)
    {
        $actor->update($request->all());
        return response()->json($actor, 200);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return response()->json(['success' => true], 200);    
    }

    public function search(String $query)
    {
        return Actor::query()->where('actorName', 'LIKE', "%$query%")->get();
    }
}
