@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Source Fuels</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Source Fuel</li>
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
                    <a class="btn btn-primary d-block" href="{{ route('admin.source_fuel.create') }}">Create Source
                        Fuel</a>
                </p>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Source Fuels</h2>
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
                            @foreach($source_fuels as $source_fuel)
                                <tr>
                                    <td>{{ $source_fuel->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.source_fuel.show', $source_fuel->id) }}">{{ $source_fuel->title }}</a>
                                    </td>
                                    <td>{{ $source_fuel->created_at }}</td>
                                    <td>{{ $source_fuel->updated_at }}</td>
                                    <td>
                                        <a class="fas fa-edit btn-outline-warning d-inline-block"
                                           href="{{ route('admin.source_fuel.edit', $source_fuel->id) }}"></a>
                                        <form class="d-inline-block"
                                              action="{{ route('admin.source_fuel.delete', $source_fuel->id) }}"
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

