@extends('layouts.dashboard')
@section('title', 'event_winner')

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

                <h4 class="card-title">Events Winners</h4>
                <p class="card-description">
                    Pemenang Event
                </p>
                <a class="btn btn-primary" href="/anggota/event_winner/create" title="Create a data"> 
                    Create
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Squad</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event_winner as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->events->event_name}}</td>
                                <td>{{$data->squads->squad_name}}</td>
                                <td>{{$data->created_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/anggota/event_winner/show/{{$data->id_event_winner }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/anggota/event_winner/edit/{{$data->id_event_winner }}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/event_winner/destroy/{{$data->id_event_winner }}" class="badge badge-danger">Delete</a>
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