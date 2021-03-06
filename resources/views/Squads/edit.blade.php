@extends('layouts.dashboard')
@section('title', 'squads')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New squads</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/anggota/squads" title="Go back"> Batal </a>
                </p> -->

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="/anggota/squads/update/{{$squad->id_squad}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="game_id">Games</label>
                            <select class="form-control" id="game_id" name="game_id">
                                <option value="">-- Select Games --</option>
                                @foreach ($games as $game)
                                <option value="{{ $game->id_game }}" {{ $game->id_game == $squad->game_id ? 'selected' : '' }}>{{ $game->game_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- select players -->
                        <div class="form-group col-sm-6">
                            <label for="squad_leader">Select Leader</label>
                            <select class="form-control" name="squad_leader" id="squad_leader">
                                <option value="{{$player->id_player}}" selected>{{$player->ingame_name}}</option>
                                @foreach($players as $player)
                                <option value="{{$player->id_player}}">{{$player->ingame_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="squad_name">Squad Name</label>
                            <input class="form-control" name="squad_name" id="squad_name" type="text" placeholder="{{ $squad->squad_name }}" value="{{ $squad->squad_name }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="squad_image">Squad Image</label>
                            <input class="form-control" name="squad_image" id="squad_image" type="file" placeholder="{{ $squad->squad_image }}" value="{{ $squad->squad_image }}">
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection