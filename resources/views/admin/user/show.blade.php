@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">User</li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Cards -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">User Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">ID</dt>
                                <dd class="col-sm-8">{{ $user->id }}</dd>
                                <dt class="col-sm-4">First Name</dt>
                                <dd class="col-sm-8">{{ $user->first_name }}</dd>
                                <dt class="col-sm-4">Last Name</dt>
                                <dd class="col-sm-8">{{ $user->last_name }}</dd>
                                <dt class="col-sm-4">E-mail</dt>
                                <dd class="col-sm-8">{{ $user->email }}</dd>
                                <dt class="col-sm-4">Avatar</dt>
                                <dd class="col-sm-8">
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="" style="width:60px">
                                </dd>
                                <dt class="col-sm-4">Staff Title</dt>
                                <dd class="col-sm-8">{{ $user->staff->title }}</dd>
                                <dt class="col-sm-4">Work Phone</dt>
                                <dd class="col-sm-8">{{ $user->w_phone }}</dd>
                                <dt class="col-sm-4">Mobile Phone</dt>
                                <dd class="col-sm-8">{{ $user->m_phone }}</dd>
                                <dt class="col-sm-4">Role</dt>
                                <dd class="col-sm-8">{{ $user->role->title}}</dd>
                                <dt class="col-sm-4">Banned</dt>
                                <dd class="col-sm-8">{{ $user->bannedTitle }}</dd>
                                @if(isset($user->created_by_user->first_name))
                                    <dt class="col-sm-4">Created</dt>
                                    <dd class="col-sm-8">{{ $user->created_at  . ' by ' . $user->created_by_user->first_name
                                . ' ' . $user->created_by_user->last_name }}</dd>
                                @endif
                                @if(isset($user->updated_by_user->first_name))
                                    <dt class="col-sm-4">Updated</dt>
                                    <dd class="col-sm-8">{{ $user->updated_at . ' by ' . $user->updated_by_user->first_name
                                . ' ' . $user->updated_by_user->last_name }}</dd>
                                @endif
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">User Sources</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>District</th>
                                    <th>In Work</th>
                                    <th>Balance</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sources as $source)
                                    <tr>
                                        <td>{{ $source->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.source.show', $source->id) }}">{{ $source->address}}</a>
                                        </td>
                                        <td>{{ $source->source_type->title }}</td>
                                        <td>{{ $source->city_district->title }}</td>
                                        <td>{{ $source->sourceInWorkStatus }}</td>
                                        <td>{{ $source->sourceBalanceStatus }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Actions</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a class="btn btn-app bg-info" href="{{ route('admin.user.create') }}">
                                <i class="fas fa-plus"></i>Create
                            </a>
                            <a class="btn btn-app bg-warning"
                               href="{{ route('admin.user.edit', $user->id) }}">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <form class="d-inline-block"
                                  action="{{ route('admin.user.delete', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button
                                    class="btn btn-app bg-danger">
                                    <i class="fas fa-trash"></i>Delete
                                </button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">More information...</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">More information...</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-4 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

