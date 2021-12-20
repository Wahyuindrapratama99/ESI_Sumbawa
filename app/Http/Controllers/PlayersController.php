<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
use App\Models\Games;
use App\Models\Players;
use App\Models\Squads;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Players::with('user', 'game', 'squad')
            ->paginate(10);
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $users = Users::all();
        $games = Games::all();
        $squads = Squads::all();
        return view('players.create', compact('users', 'games', 'squads'));
    }

    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id_user;
        $request['squad_id'] = null;
        $request->player_image = null;

        $request->validate([
            "game_id" => "required",
            "ingame_name" => "required",
            "ingame_id" => "required",
            "player_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $player = Players::create($request->all());
        $player->player_image = Upload::uploadFile($request, 'player_image');
        $player->save();

        if (Auth::user()->user_role !== 'admin') return redirect('players/players')->with('success', 'Player created successfully');
        return redirect('/players')->with('success', 'Player has been added');
    }

    public function show($id)
    {
        $players = Players::find($id);
        return view('players.detail', compact('players'));
    }

    public function account($id)
    {
        $players = Players::where('user_id', $id)->paginate(10);
        return view('players.account', compact('players'));
    }

    public function edit($id)
    {
        $users = Users::all();
        $games = Games::all();
        $squads = Squads::all();
        $players = Players::find($id);
        return view('players.edit', compact('players', 'users', 'games', 'squads'));
    }

    public function update(Request $request, $id)
    {
        $player = Players::find($id)->update($request->all());

        if ($request->hasFile('player_image')) {
            $player = Players::find($id);
            $player->player_image = Upload::uploadFile($request, 'player_image');
            $player->save();
        }

        if (Auth::user()->user_role !== 'admin') return redirect('players/players')->with('success', 'Player created successfully');
        return redirect('/players')->with('success', 'Player has been updated');
    }

    public function destroy($id)
    {
        Players::find($id)->delete();

        return redirect(url()->previous())->with('success', 'Player has been deleted');
    }

    // ambil data player berdasarkan user login
    public function players()
    {
        $players = Players::with('user', 'game', 'squad')
            ->where('user_id', Auth::user()->id_user)
            ->paginate(10);
        return view('players.index', compact('players'));
    }
}
