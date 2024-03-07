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
                <div class="col-md-8">
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">General Information</h3>
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
                                <dd class="col-sm-8">{{ $source->id }}</dd>
                                <dt class="col-sm-4">Address</dt>
                                <dd class="col-sm-8">{{ $source->address }}</dd>
                                <dt class="col-sm-4">Connected Power</dt>
                                <dd class="col-sm-8">{{ $source->connected_power }}</dd>
                                <dt class="col-sm-4">GPS</dt>
                                <dd class="col-sm-8">{{ $source->gps }}</dd>
                                <dt class="col-sm-4">Fuel</dt>
                                <dd class="col-sm-8">
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
                                </dd>
                                <dt class="col-sm-4">Type</dt>
                                <dd class="col-sm-8">{{ $source->source_type->title }}</dd>
                                <dt class="col-sm-4">District</dt>
                                <dd class="col-sm-8">{{ $source->city_district->title  }}</dd>
                                <dt class="col-sm-4">User</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ route('admin.user.show', $source->user->id) }}">{{ $source->user->first_name . ' ' . $source->user->last_name }}</a>
                                </dd>
                                <dt class="col-sm-4">In Work</dt>
                                <dd class="col-sm-8">{{ $source->sourceInWorkStatus }}</dd>
                                <dt class="col-sm-4">Monitoring</dt>
                                <dd class="col-sm-8">{{ $source->monitoringStatus }}</dd>
                                <dt class="col-sm-4">Balance</dt>
                                <dd class="col-sm-8">{{ $source->sourceBalanceStatus }}</dd>
                                @if(isset($source->created_by_user->first_name))
                                    <dt class="col-sm-4">Created</dt>
                                    <dd class="col-sm-8">{{ $source->created_at  . ' by ' . $source->created_by_user->first_name
                                . ' ' . $source->created_by_user->last_name }}</dd>
                                @endif
                                @if(isset($source->updated_by_user->first_name))
                                    <dt class="col-sm-4">Updated</dt>
                                    <dd class="col-sm-8">{{ $source->updated_at . ' by ' . $source->updated_by_user->first_name
                                . ' ' . $source->updated_by_user->last_name }}</dd>
                                @endif
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Boilers</h3>
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
                                    <th>Title</th>
                                    <th>Power</th>
                                    <th>Fuel</th>
                                    <th>Mount Year</th>
                                    <th>Check Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($boilers as $boiler)
                                    <tr>
                                        <td>{{ $boiler->index_number }}</td>
                                        <td>
                                            <a href="{{ route('admin.boiler.show', $boiler->id) }}">{{ $boiler->title}}</a>
                                        </td>
                                        <td>{{ $boiler->power }}</td>
                                        <td>{{ $boiler->boiler_fuel->title }}</td>
                                        <td>{{ $boiler->mount_year }}</td>
                                        <td>{{ $boiler->check_date }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Pumps</h3>
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
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Max Cap</th>
                                    <th>Max Press</th>
                                    <th>Engine Power</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pumps as $pump)
                                    <tr class="">
                                        <td>{{ $pump->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.pump.show', $pump->id) }}">{{ $pump->title}}</a>
                                        </td>
                                        <td>{{ $pump->pump_type->title }}</td>
                                        <td>{{ $pump->max_capacity }}</td>
                                        <td>{{ $pump->max_pressure }}</td>
                                        <td>{{ $pump->engine_power }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Heating Pipelines</h3>
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
                                    <th>ID</th>
                                    <th>Section</th>
                                    <th>Direct Diam</th>
                                    <th>Reverse Diam</th>
                                    <th>Length</th>
                                    <th>Purpose</th>
                                    <th>Laying</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($heating_pipelines as $heating_pipeline)
                                    <tr class="">
                                        <td>{{ $heating_pipeline->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.heating_pipeline.show', $heating_pipeline->id) }}">
                                                {{ $heating_pipeline->pipe_start . ' - ' . $heating_pipeline->pipe_end }}</a>
                                        </td>
                                        <td>{{ $heating_pipeline->direct_diam }}</td>
                                        <td>{{ $heating_pipeline->reverse_diam }}</td>
                                        <td>{{ $heating_pipeline->length }}</td>
                                        <td>{{ $heating_pipeline->heatingPipelinePurposeType }}</td>
                                        <td>{{ $heating_pipeline->heatingPipelineLayingType }}</td>
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
                            <a class="btn btn-app bg-info" href="{{ route('admin.source.create') }}">
                                <i class="fas fa-plus"></i>Create
                            </a>
                            <a class="btn btn-app bg-warning"
                               href="{{ route('admin.source.edit', $source->id) }}">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <form class="d-inline-block"
                                  action="{{ route('admin.source.delete', $source->id) }}" method="post">
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
                            <h3 class="card-title">Source on the Map</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('includes.maps.one_source')
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Water Meters</h3>
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
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Diameter</th>
                                    <th>Purpose</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($water_meters as $water_meter)
                                    <tr>
                                        <td>{{ $water_meter->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.water_meter.show', $water_meter->id) }}">{{ $water_meter->title}}</a>
                                        </td>
                                        <td>{{ $water_meter->diameter }}</td>
                                        <td>{{ $water_meter->waterMeterPurpose }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

