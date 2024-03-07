@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Heating Pipeline</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Heating Pipeline</li>
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
            <!-- Cards -->
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
                                <dd class="col-sm-8">{{ $heating_pipeline->id }}</dd>
                                <dt class="col-sm-4">Source</dt>
                                <dd class="col-sm-8"><a href="{{ route('admin.source.show', $heating_pipeline->source->id) }}">
                                        {{ $heating_pipeline->source->address}}</a></dd>
                                <dt class="col-sm-4">Start Point</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->pipe_start }}</dd>
                                <dt class="col-sm-4">End Point</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->pipe_end }}</dd>
                                <dt class="col-sm-4">Direct Diam</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->direct_diam }}</dd>
                                <dt class="col-sm-4">Reverse Diam</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->reverse_diam }}</dd>
                                <dt class="col-sm-4">Length</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->length }}</dd>
                                <dt class="col-sm-4">Purpose</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->heatingPipelinePurposeType }}</dd>
                                <dt class="col-sm-4">Laying</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->heatingPipelineLayingType }}</dd>
                                <dt class="col-sm-4">Ins Type</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->heatingPipelineInsType }}</dd>
                                <dt class="col-sm-4">Ins Cond</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->heatingPipelineInsCondition }}</dd>
                                <dt class="col-sm-4">Ins Thick</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->ins_thick }}</dd>
                                <dt class="col-sm-4">Height</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->height }}</dd>
                                <dt class="col-sm-4">Build Year</dt>
                                <dd class="col-sm-8">{{ $heating_pipeline->build_year }}</dd>
                                @if(isset($heating_pipeline->created_by_user->first_name))
                                    <dt class="col-sm-4">Created</dt>
                                    <dd class="col-sm-8">{{ $heating_pipeline->created_at  . ' by ' . $heating_pipeline->created_by_user->first_name
                                . ' ' . $heating_pipeline->created_by_user->last_name }}</dd>
                                @endif
                                @if(isset($heating_pipeline->updated_by_user->first_name))
                                    <dt class="col-sm-4">Updated</dt>
                                    <dd class="col-sm-8">{{ $heating_pipeline->updated_at . ' by ' . $heating_pipeline->updated_by_user->first_name
                                . ' ' . $heating_pipeline->updated_by_user->last_name }}</dd>
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
                            <a class="btn btn-app bg-info" href="{{ route('admin.heating_pipeline.create') }}">
                                <i class="fas fa-plus"></i>Create
                            </a>
                            <a class="btn btn-app bg-warning"
                               href="{{ route('admin.heating_pipeline.edit', $heating_pipeline->id) }}">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <form class="d-inline-block"
                                  action="{{ route('admin.heating_pipeline.delete', $heating_pipeline->id) }}" method="post">
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
                            <h3 class="card-title">More Heating Pipelines from this source</h3>
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
                                @foreach($heating_pipeline->source->heating_pipelines as $heating_pipeline)
                                    <li>
                                        <a href="{{ route('admin.heating_pipeline.show', $heating_pipeline->id) }}">
                                            {{ $heating_pipeline->pipe_start . ' - ' . $heating_pipeline->pipe_end }}</a>
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

