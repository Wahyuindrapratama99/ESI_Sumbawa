@extends('layouts.dashboard')
@section('title', 'event_inv_teams')

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

                <h4 class="card-title">Invite teams</h4>
                <p class="card-description">
                    Squadmu telah diinvite untuk bergabung di event ini.
                </p>
                <!-- <a class="btn btn-primary" href="/event_inv_teams/create" title="Create a data"> 
                    Create
                </a> -->
                <div class="table-responsive">
                    <!-- search event -->
                    <x-search name="event"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Squad</th>
                                <th>Tanggal Invite</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty event_inv_teams -->
                            @if($event_inv_teams->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($event_inv_teams as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->event_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->status ? 'Diterima' : 'Menunggu'}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <?php if ($data->status) { ?>
                                            <a href="/anggota/event_inv_teams/destroy/{{$data->id_event_inv_teams}}" class="badge badge-danger">Delete</a>
                                        <?php } else { ?>
                                            <a href="/anggota/event_inv_teams/terima/{{$data->id_event_inv_teams}}" class="badge badge-info">Terima</a>
                                            <a href="/anggota/event_inv_teams/destroy/{{$data->id_event_inv_teams}}" class="badge badge-danger">Tolak</a>
                                        <?php } ?>
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