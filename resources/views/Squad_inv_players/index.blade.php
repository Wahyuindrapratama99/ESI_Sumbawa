@extends('layouts.dashboard')
@section('title', 'squad_inv_players')

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

                <h4 class="card-title">Invite player</h4>
                <p class="card-description">
                    <!-- Add class <code>.table-hover</code> -->
                    Menu untuk invite player
                </p>
                <a class="btn btn-primary" href="/anggota/squad_inv_players/create" title="Create a data"> 
                    Create
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Squad</th>
                                <th>Player</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($squad_inv_players as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->ingame_name}}</td>
                                <td>{{$data->status == 0 ? 'Waiting' : 'Accepted'}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/anggota/squad_inv_players/destroy/{{$data->id_squad_inv_player }}" class="badge badge-danger">{{$data->status ? 'Delete' : 'Batal'}}</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection