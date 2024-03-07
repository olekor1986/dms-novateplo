@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Heating Pipelines</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Heating Pipeline</li>
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
                <a class="btn btn-app bg-info" href="{{ route('admin.heating_pipeline.create') }}">
                    <i class="fas fa-plus"></i>Create
                </a>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Heating Pipeline</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="index_table" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Source</th>
                                <th>Section</th>
                                <th>Direct Diam</th>
                                <th>Reverse Diam</th>
                                <th>Length</th>
                                <th>Purpose</th>
                                <th>Laying</th>
                                <th>Ins Type</th>
                                <th>Ins Cond</th>
                                <th>Ins Thick</th>
                                <th>Height</th>
                                <th>Build Year</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($heating_pipelines as $heating_pipeline)
                                <tr>
                                    <td>{{ $heating_pipeline->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.source.show', $heating_pipeline->source->id) }}">
                                            {{ $heating_pipeline->source->address}}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.heating_pipeline.show', $heating_pipeline->id) }}">
                                            {{ $heating_pipeline->pipe_start . ' - ' . $heating_pipeline->pipe_end }}</a>
                                    </td>
                                    <td>{{ $heating_pipeline->direct_diam }}</td>
                                    <td>{{ $heating_pipeline->reverse_diam }}</td>
                                    <td>{{ $heating_pipeline->length }}</td>
                                    <td>{{ $heating_pipeline->heatingPipelinePurposeType }}</td>
                                    <td>{{ $heating_pipeline->heatingPipelineLayingType }}</td>
                                    <td>{{ $heating_pipeline->heatingPipelineInsType }}</td>
                                    <td>{{ $heating_pipeline->heatingPipelineInsCondition }}</td>
                                    <td>{{ $heating_pipeline->ins_thick }}</td>
                                    <td>{{ $heating_pipeline->height }}</td>
                                    <td>{{ $heating_pipeline->build_year }}</td>
                                    <td>
                                        <a class="fas fa-edit btn-outline-warning d-inline-block"
                                           href="{{ route('admin.heating_pipeline.edit', $heating_pipeline->id) }}"></a>
                                        <form class="d-inline-block"
                                              action="{{ route('admin.heating_pipeline.delete', $heating_pipeline->id) }}"
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
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

