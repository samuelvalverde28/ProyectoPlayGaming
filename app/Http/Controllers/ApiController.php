<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class ApiController extends Controller
{
    /**
     * you view all games
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return Game::all();
    }

    /**
     * you view information about the game that you select with id
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Game $id)
    {
        return $id;
    }

    /**
     * you view information about the game that you select with name
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showName($id)
    {
        $games = Game::where('name','like',"%$id%")->get();
        
        return response()->json($games, 200);
    }

    /**
     * you add games
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $games = Game::create($request->all());
        return response()->json($games, 201);
    }

    /**
     * you update the games that select with id
     * 
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        $games = Game::findOrFail($id);
        $games->update($request->all());
        return $games;
    }

    /**
     * delete a game that you select with id
     * 
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete(Game $id)
    {
        $id->delete();
        return response()->json(null, 204);
    }
    

}