@extends('layouts.dashboard')
@section('title', 'users')

@section('content')
<div class="row">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Users</h4>
                <p class="card-description">
                    Daftar user yang terdaftar di sistem
                </p>
                <a class="btn btn-primary" href="/anggota/users/create" title="Create a data"> 
                    Create
                </a>
                <div class="table-responsive">
                    <!-- search user -->
                    <x-search name="user" />
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Role</th>
                                <th>Nama</th>
                                <th>Tanggal Daftar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty users -->
                            @if($users->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($users as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->user_role}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->created_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- <a href="/anggota/users/show/{{$data->id_user }}" title="show" class="badge badge-info">Show</a> -->
                                        <a href="/anggota/users/edit/{{$data->id_user }}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/users/destroy/{{$data->id_user }}" class="badge badge-danger">Delete</a>
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