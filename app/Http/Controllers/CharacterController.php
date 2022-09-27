<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request)
    {
        return Character::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $character = Character::create($request->all());
        return response()->json($character, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \App\Models\Character
     */
    public function show(Character $character)
    {
        return $character;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Character $character)
    {
        $character->update($request->all());
        return response()->json($character, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return response()->json(['success' => true], 200);
    }

    public function search(String $query)
    {
        return Character::query()->where('characterName', 'LIKE', "%$query%")->get();
    }
}