<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class LobbyController extends Controller
{
    //

    public function index()
    {
        $data = Game::where('status', 'new')->paginate();
        
        return view('lobby', [
            'data' => $data
        ]);
    }
    
    public function createGame()
    {
        return view('create-game');
    }

    public function store(Request $request)
    {
        $this->validate($request, Game::getRules());

        $game = new Game([
            'name' => $request->get('name'),
            'status' => 'new',
            'created_by' => Auth::user()->id
        ]);
        
        $game->save();

        $game->users()->attach(Auth::user()->id);
        session(['game_wait_id' => $game->id]);
        
        return redirect('lobby/wait');
    }

    public function wait()
    {
        return view('wait', [
            'game_id' => session('game_wait_id')
        ]);
    }
}
