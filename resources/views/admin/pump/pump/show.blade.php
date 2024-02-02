@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Pump</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Pump</li>
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
                                <dd class="col-sm-8">{{ $pump->id }}</dd>
                                <dt class="col-sm-4">Title</dt>
                                <dd class="col-sm-8">{{ $pump->title }}</dd>
                                <dt class="col-sm-4">Type</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ route('admin.pump_type.show', $pump->pump_type->id) }}">{{ $pump->pump_type->title}}</a>
                                </dd>
                                <dt class="col-sm-4">Source</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ route('admin.source.show', $pump->source->id) }}">{{ $pump->source->address}}</a>
                                </dd>
                                <dt class="col-sm-4">Max Cap</dt>
                                <dd class="col-sm-8">{{ $pump->max_capacity }}</dd>
                                <dt class="col-sm-4">Max Press</dt>
                                <dd class="col-sm-8">{{ $pump->max_pressure }}</dd>
                                <dt class="col-sm-4">Engine Power</dt>
                                <dd class="col-sm-8">{{ $pump->engine_power }}</dd>
                                <dt class="col-sm-4">Engine Speed</dt>
                                <dd class="col-sm-8">{{ $pump->engine_speed }}</dd>
                                <dt class="col-sm-4">Engine Title</dt>
                                <dd class="col-sm-8">{{ $pump->engine_title }}</dd>
                                <dt class="col-sm-4">S Number</dt>
                                <dd class="col-sm-8">{{ $pump->serial_number }}</dd>
                                <dt class="col-sm-4">Shaft Diam</dt>
                                <dd class="col-sm-8">{{ $pump->shaft_diam }}</dd>
                                <dt class="col-sm-4">F Bearing</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ route('admin.bearing.show', $pump->front_bearing->id) }}">{{ $pump->front_bearing->title}}</a>
                                </dd>
                                <dt class="col-sm-4">R Bearing</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ route('admin.bearing.show', $pump->rear_bearing->id) }}">{{ $pump->rear_bearing->title}}</a>
                                </dd>
                                <dt class="col-sm-4">M Seal</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ route('admin.mechanical_seal.show', $pump->mechanical_seal->id) }}">{{ $pump->mechanical_seal->title}}</a>
                                </dd>
                                <dt class="col-sm-4">In Work</dt>
                                <dd class="col-sm-8">{{ $pump->pumpInWorkStatus }}</dd>
                                @if(isset($pump->created_by_user->first_name))
                                    <dt class="col-sm-4">Created</dt>
                                    <dd class="col-sm-8">{{ $pump->created_at  . ' by ' . $pump->created_by_user->first_name
                                . ' ' . $pump->created_by_user->last_name }}</dd>
                                @endif
                                @if(isset($pump->updated_by_user->first_name))
                                    <dt class="col-sm-4">Updated</dt>
                                    <dd class="col-sm-8">{{ $pump->updated_at . ' by ' . $pump->updated_by_user->first_name
                                . ' ' . $pump->updated_by_user->last_name }}</dd>
                                @endif
                            </dl>
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
                            <a class="btn btn-app bg-info" href="{{ route('admin.pump.create') }}">
                                <i class="fas fa-plus"></i>Create
                            </a>
                            <a class="btn btn-app bg-warning"
                               href="{{ route('admin.pump.edit', $pump->id) }}">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <form class="d-inline-block"
                                  action="{{ route('admin.pump.delete', $pump->id) }}" method="post">
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
                            <h3 class="card-title">More pumps from this source</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ol>
                                @foreach($pump->source->pumps as $pump)
                                    <li>
                                        <a href="{{ route('admin.pump.show', $pump->id) }}">{{ $pump->title}}</a>
                                    </li>
                                @endforeach
                            </ol>
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

