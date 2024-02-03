@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Mechanical Seals</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Mechanical Seal</li>
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
                <a class="btn btn-app bg-info" href="{{ route('admin.mechanical_seal.create') }}">
                    <i class="fas fa-plus"></i>Create
                </a>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Mechanical Seals</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="index_table" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mechanical_seals as $mechanical_seal)
                                <tr>
                                    <td>{{ $mechanical_seal->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.mechanical_seal.show', $mechanical_seal->id) }}">{{ $mechanical_seal->title }}</a>
                                    </td>
                                    <td>{{ $mechanical_seal->created_at }}</td>
                                    <td>{{ $mechanical_seal->updated_at }}</td>
                                    <td>
                                        <a class="fas fa-edit btn-outline-warning d-inline-block"
                                           href="{{ route('admin.mechanical_seal.edit', $mechanical_seal->id) }}"></a>
                                        <form class="d-inline-block"
                                              action="{{ route('admin.mechanical_seal.delete', $mechanical_seal->id) }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="fas fa-trash btn-outline-danger border-0 bg-transparent"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

