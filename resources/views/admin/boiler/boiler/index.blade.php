@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Boilers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Boiler</li>
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
                <a class="btn btn-app bg-info" href="{{ route('admin.boiler.create') }}">
                    <i class="fas fa-plus"></i>Create
                </a>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Boiler Rooms</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="index_table" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Source</th>
                                <th>Energy Carrier</th>
                                <th>Burner Type</th>
                                <th>Fuel</th>
                                <th>Power</th>
                                <th>Efficient</th>
                                <th>Mount Year</th>
                                <th>Launch Year</th>
                                <th>Index Number</th>
                                <th>Serial Number</th>
                                <th>Reg Number</th>
                                <th>Check Date</th>
                                <th>In Work</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($boilers as $boiler)
                                <tr>
                                    <td>{{ $boiler->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.boiler.show', $boiler->id) }}">{{ $boiler->title}}</a>
                                    </td>
                                    <td>{{ $boiler->source->address}}</td>
                                    <td>{{ $boiler->boilerEnergyCarrier}}</td>
                                    <td>{{ $boiler->burner_type->title}}</td>
                                    <td>{{ $boiler->boiler_fuel->title }}</td>
                                    <td>{{ $boiler->power}}</td>
                                    <td>{{ $boiler->efficient}}</td>
                                    <td>{{ $boiler->mount_year}}</td>
                                    <td>{{ $boiler->launch_year}}</td>
                                    <td>{{ $boiler->index_number}}</td>
                                    <td>{{ $boiler->serial_number}}</td>
                                    <td>{{ $boiler->reg_number}}</td>
                                    <td>{{ $boiler->check_date}}</td>
                                    <td>{{ $boiler->in_work}}</td>
                                    <td>
                                        <a class="fas fa-edit btn-outline-warning d-inline-block"
                                           href="{{ route('admin.boiler.edit', $boiler->id) }}"></a>
                                        <form class="d-inline-block"
                                              action="{{ route('admin.boiler.delete', $boiler->id) }}" method="post">
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

