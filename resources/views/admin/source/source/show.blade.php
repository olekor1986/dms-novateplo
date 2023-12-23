@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Source</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Source</li>
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
                                <th>Address</th>
                                <th>Connected Power</th>
                                <th>GPS</th>
                                <th>Fuel</th>
                                <th>Type</th>
                                <th>District</th>
                                <th>User</th>
                                <th>In Work</th>
                                <th>Monitoring</th>
                                <th>Balance</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $source->id }}</td>
                                <td>{{ $source->address}}</td>
                                <td>{{ $source->connected_power }}</td>
                                <td>{{ $source->gps }}</td>
                                <td>{{ $source->source_fuel->title }}</td>
                                <td>{{ $source->source_type->title }}</td>
                                <td>{{ $source->city_district->title }}</td>
                                <td>{{ $source->user->first_name . ' ' . $source->user->last_name }}</td>
                                <td>{{ $source->inWorkStatus }}</td>
                                <td>{{ $source->monitoringStatus }}</td>
                                <td>{{ $source->balanceStatus }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                @include('includes.maps.one_source')
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

