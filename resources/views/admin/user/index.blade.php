@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">User</li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <p>
                    <a class="btn btn-primary" href="{{ route('admin.user.create') }}">Create User</a>
                </p>
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>E-mail</th>
                        <th>Avatar</th>
                        <th>Staff Title</th>
                        <th>Work Phone</th>
                        <th>Mobile Phone</th>
                        <th>Role</th>
                        <th>Banned</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="{{ route('admin.user.show', $user->id) }}">{{ $user->first_name . ' ' . $user->last_name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td><img src="{{ asset('storage/' . $user->avatar) }}" alt="" style="width:60px"></td>
                            <td>{{ $user->staff->title }}</td>
                            <td>{{ $user->w_phone }}</td>
                            <td>{{ $user->m_phone }}</td>
                            <td>{{ $user->role->title }}</td>
                            <td>{{ $user->bannedTitle }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.user.edit', $user->id) }}">Edit</a></td>
                            </td>
                            <td>
                                <form action="{{ route('admin.user.delete', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

