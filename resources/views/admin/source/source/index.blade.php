@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Heat Sources</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Heat Source</li>
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
                <a class="btn btn-app bg-info" href="{{ route('admin.source.create') }}">
                    <i class="fas fa-plus"></i>Create
                </a>
            </div>
            <div class="row">
                <div class="col-md-12">
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
                                    <th>Address</th>
                                    <th>Connected Power</th>
                                    <th>GPS</th>
                                    <th>Fuel</th>
                                    <th>Type</th>
                                    <th>District</th>
                                    <th>Master</th>
                                    <th>S Master</th>
                                    <th>In Work</th>
                                    <th>Monitoring</th>
                                    <th>Balance</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sources as $source)
                                    <tr>
                                        <td>{{ $source->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.source.show', $source->id) }}">{{ $source->address}}</a>
                                        </td>
                                        <td>{{ $source->connected_power }}</td>
                                        <td>{{ $source->gps }}</td>
                                        <td>
                                            @php
                                                $fuels = [];
                                                foreach($source->boilers as $boiler){
                                                    $fuels[] = $boiler->boiler_fuel->title;
                                                }
                                                $fuels = array_values(array_unique($fuels));
                                                $fuelsCount = count($fuels);
                                            @endphp
                                            @foreach($fuels as $key => $fuel)
                                                @if($key != ($fuelsCount - 1))
                                                    {{ $fuel . ', ' }}
                                                @else
                                                    {{ $fuel }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $source->source_type->title }}</td>
                                        <td>{{ $source->city_district->title }}</td>
                                        <td>
                                            @if($source->master != NULL)
                                                {{ $source->master->first_name . ' ' . $source->master->last_name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($source->s_master != NULL)
                                                {{ $source->s_master->first_name . ' ' . $source->s_master->last_name }}
                                            @endif
                                        </td>
                                        <td>{{ $source->sourceInWorkStatus }}</td>
                                        <td>{{ $source->monitoringStatus }}</td>
                                        <td>{{ $source->sourceBalanceStatus }}</td>
                                        <td>
                                            <a class="fas fa-edit btn-outline-warning d-inline-block"
                                               href="{{ route('admin.source.edit', $source->id) }}"></a>
                                            <form class="d-inline-block"
                                                  action="{{ route('admin.source.delete', $source->id) }}"
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Boiler Rooms Map</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('includes.maps.all_sources')
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

