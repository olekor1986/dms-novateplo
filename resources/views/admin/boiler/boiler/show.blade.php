@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Boiler</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Boiler</li>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                                <table id="show_table" class="table table-sm table-bordered table-striped">
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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $boiler->id }}</td>
                                <td>{{ $boiler->title}}</td>
                                <td>{{ $boiler->source->address}}</td>
                                <td>{{ $boiler->energy_carrier}}</td>
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
                            </tr>
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

