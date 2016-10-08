<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class GameController extends Controller
{
    //
    public function check()
    {
        $game = Game::findOrFail(session('game_wait_id'));
        $response = [
            'success' => count($game->users) == 2
        ];

        return $response;
    }

    public function join($id)
    {
        $game = Game::findOrFail($id);
        
        if (count($game->users) >= 2) {
            throw new Exception('There can be only two players in the game');
        }
        
        $game->users()->attach(Auth::user()->id);
        $game->status = 'busy';
        $game->save();
        
        return redirect('play-game');
    }
    
    public function game()
    {
        return view('game');
    }

}
