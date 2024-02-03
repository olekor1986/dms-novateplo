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
                                <dd class="col-sm-8">{{ $boiler->id }}</dd>
                                <dt class="col-sm-4">Title</dt>
                                <dd class="col-sm-8">{{ $boiler->title }}</dd>
                                <dt class="col-sm-4">Energy Carrier</dt>
                                <dd class="col-sm-8">{{ $boiler->boilerEnergyCarrier }}</dd>
                                <dt class="col-sm-4">Burner Type</dt>
                                <dd class="col-sm-8">{{ $boiler->burner_type->title }}</dd>
                                <dt class="col-sm-4">Fuel</dt>
                                <dd class="col-sm-8">{{ $boiler->boiler_fuel->title }}</dd>
                                <dt class="col-sm-4">Power</dt>
                                <dd class="col-sm-8">{{ $boiler->power }}</dd>
                                <dt class="col-sm-4">Efficient</dt>
                                <dd class="col-sm-8">{{ $boiler->efficient }}</dd>
                                <dt class="col-sm-4">Mount Year</dt>
                                <dd class="col-sm-8">{{ $boiler->mount_year }}</dd>
                                <dt class="col-sm-4">Launch Year</dt>
                                <dd class="col-sm-8">{{ $boiler->launch_year }}</dd>
                                <dt class="col-sm-4">Index Number</dt>
                                <dd class="col-sm-8">{{ $boiler->index_number }}</dd>
                                <dt class="col-sm-4">Serial Number</dt>
                                <dd class="col-sm-8">{{ $boiler->serial_number }}</dd>
                                <dt class="col-sm-4">Reg Number</dt>
                                <dd class="col-sm-8">{{ $boiler->reg_number }}</dd>
                                <dt class="col-sm-4">Check Date</dt>
                                <dd class="col-sm-8">{{ $boiler->check_date }}</dd>
                                <dt class="col-sm-4">In Work</dt>
                                <dd class="col-sm-8">{{ $boiler->boilerInWorkStatus }}</dd>
                                @if(isset($boiler->created_by_user->first_name))
                                    <dt class="col-sm-4">Created</dt>
                                    <dd class="col-sm-8">{{ $boiler->created_at  . ' by ' . $boiler->created_by_user->first_name
                                . ' ' . $boiler->created_by_user->last_name }}</dd>
                                @endif
                                @if(isset($boiler->updated_by_user->first_name))
                                    <dt class="col-sm-4">Updated</dt>
                                    <dd class="col-sm-8">{{ $boiler->updated_at . ' by ' . $boiler->updated_by_user->first_name
                                . ' ' . $boiler->updated_by_user->last_name }}</dd>
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
                            <a class="btn btn-app bg-info" href="{{ route('admin.boiler.create') }}">
                                <i class="fas fa-plus"></i>Create
                            </a>
                            <a class="btn btn-app bg-warning"
                               href="{{ route('admin.boiler.edit', $boiler->id) }}">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <form class="d-inline-block"
                                  action="{{ route('admin.boiler.delete', $boiler->id) }}" method="post">
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
                            <h3 class="card-title">More boilers from this source</h3>
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
                                @foreach($boiler->source->boilers as $boiler)
                                    <li>
                                        <a href="{{ route('admin.boiler.show', $boiler->id) }}">{{ $boiler->title}}</a>
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

