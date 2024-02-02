@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pumps</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Pump</li>
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
                    <a class="btn btn-app bg-info" href="{{ route('admin.pump.create') }}">
                        <i class="fas fa-plus"></i>Create
                    </a>
                </p>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Pump</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="index_table" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Source</th>
                                <th>Max Cap</th>
                                <th>Max Press</th>
                                <th>Engine Power</th>
                                <th>Engine Speed</th>
                                <th>Engine Type</th>
                                <th>S Number</th>
                                <th>Shaft Diam</th>
                                <th>F Bearing</th>
                                <th>R Bearing</th>
                                <th>M Seal</th>
                                <th>In Work</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pumps as $pump)
                                <tr>
                                    <td>{{ $pump->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.pump.show', $pump->id) }}">{{ $pump->title}}</a>
                                    </td>
                                    <td>{{ $pump->pump_type->title }}</td>
                                    <td>{{ $pump->source->address }}</td>
                                    <td>{{ $pump->max_capacity }}</td>
                                    <td>{{ $pump->max_pressure }}</td>
                                    <td>{{ $pump->engine_power }}</td>
                                    <td>{{ $pump->engine_speed }}</td>
                                    <td>{{ $pump->engine_title }}</td>
                                    <td>{{ $pump->serial_number }}</td>
                                    <td>{{ $pump->shaft_diam }}</td>
                                    <td>{{ $pump->front_bearing->title }}</td>
                                    <td>{{ $pump->rear_bearing->title }}</td>
                                    <td>{{ $pump->mechanical_seal->title }}</td>
                                    <td>{{ $pump->in_work }}</td>
                                    <td>
                                        <a class="fas fa-edit btn-outline-warning d-inline-block"
                                           href="{{ route('admin.pump.edit', $pump->id) }}"></a>
                                        <form class="d-inline-block"
                                              action="{{ route('admin.pump.delete', $pump->id) }}" method="post">
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

