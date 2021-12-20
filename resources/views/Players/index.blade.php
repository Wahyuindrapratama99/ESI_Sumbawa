@extends('layouts.dashboard')
@section('title', 'players')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">{{ Request::is('players/players') ? 'My Game Account' : 'All Game Account' }}</h4>
                <p class="card-description">
                    Daftar player yang terdaftar
                </p>

                @if(Request::is('players/players'))
                <div class="menu">
                    <a class="btn btn-primary" href="/players/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                        Create
                    </a>
                    <a class="btn btn-primary" href="/squad_inv_players/inviteFromSquad" title="Create a data"> <i class="fas fa-plus-circle"></i>
                        Squad invite
                    </a>
                    <a class="btn btn-primary" href="/request_squads" title="Create a data"> <i class="fas fa-plus-circle"></i>
                        Request squad
                    </a>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Squad</th>
                                <th>Game</th>
                                <th>Dibuat Pada</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->ingame_name}}</td>
                                <td>{{$data->squad ? $data->squad->squad_name : 'Tidak join squad'}}</td>
                                <td>{{$data->game->game_name}}</td>
                                <td>{{$data->created_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/home/player/{{$data->id_player }}" title="show" class="badge badge-info">Show</a>
                                        @if(Request::is('players/players'))
                                        <a href="/players/edit/{{$data->id_player }}" class="badge badge-warning">Edit</a>
                                        <a href="/players/destroy/{{$data->id_player }}" class="badge badge-danger">Delete</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    {{ $players->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection