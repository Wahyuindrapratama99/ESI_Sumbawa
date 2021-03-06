<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\Request_squads;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Request_squadsController extends Controller
{

    public function index()
    {
        $players = Players::where('user_id', Auth::user()->id_user)->select('id_player')->get();

        $request_squads = Request_squads::with('squads', 'players')
            ->whereIn('player_id', $players->pluck('id_player'))
            ->paginate(10);

        return view('Request_squads.index', compact('request_squads'));
    }


    public function create()
    {
        $players = Players::where('user_id', Auth::user()->id_user)->get();
        $squads = Squads::all();
        return view('Request_squads.create', compact('players', 'squads'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'player_id' => 'required',
            'squad_id' => 'required',
            'status' => 'required',
        ]);
        $player = Players::where('id_player', $request->player_id)
            ->select('squad_id')
            ->first();

        if ($player->squad_id) {
            return redirect('/squad_inv_players/create')
                ->with('error', 'Player is already in a squad');
        }

        Request_squads::create($request->all());
        return redirect('/request_squads')->with('success', 'Request_squads created successfully');
    }

    public function show($id)
    {
        $request_squads = Request_squads::findOrFail($id);
        return view('Request_squads.show', compact('request_squads'));
    }

    public function edit($id)
    {
        $players = Players::where('user_id', Auth::user()->id_user)->get();
        $squads = Squads::all();
        $request_squads = Request_squads::findOrFail($id);
        return view('Request_squads.edit', compact('request_squads', 'players', 'squads'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'player_id' => 'required',
            'squad_id' => 'required',
            'status' => 'required',
        ]);
        $player = Players::where('id_player', $request->player_id)
            ->select('squad_id')
            ->first();

        if ($player->squad_id) {
            return redirect('/squad_inv_players/create')
                ->with('error', 'Player is already in a squad');
        }

        Request_squads::findOrFail($id)
            ->update($request->all());
        return redirect('/request_squads')->with('success', 'Request_squads updated successfully');
    }

    public function destroy($id)
    {
        Request_squads::findOrFail($id)->delete();
        return redirect(url()->previous())->with('success', 'Request_squads deleted successfully');
    }

    public function requestFromPlayers()
    {
        $request_squads = Request_squads::join('squads', 'request_squads.squad_id', 'squads.id_squad')
            ->join('players', 'request_squads.player_id', 'players.id_player')
            ->where('players.user_id', Auth::user()->id_user)
            ->select('request_squads.*', 'squads.name_squad', 'players.ingame_name')
            ->paginate(10);

        return view('Request_squads.request', compact('request_squads'));
    }

    public function terima($id)
    {
        $request_squads = Request_squads::findOrFail($id);
        Players::where('id_player', $request_squads->player_id)->update(['squad_id' => $request_squads->squad_id]);
        $request_squads->status = 1;
        $request_squads->save();

        return redirect(url()->previous())->with('success', 'Request_squads updated successfully');
    }
}
