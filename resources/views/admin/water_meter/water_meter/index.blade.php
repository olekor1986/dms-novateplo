@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Water Meters</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Water Meter</li>
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
                <a class="btn btn-app bg-info" href="{{ route('admin.water_meter.create') }}">
                    <i class="fas fa-plus"></i>Create
                </a>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Water Meter</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="index_table" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Source</th>
                                <th>Title</th>
                                <th>Diameter</th>
                                <th>S Number</th>
                                <th>Purpose</th>
                                <th>Check Date</th>
                                <th>Year Of Made</th>
                                <th>Condition</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($water_meters as $water_meter)
                                <tr>
                                    <td>{{ $water_meter->id }}</td>
                                    <td>{{ $water_meter->source->address }}</td>
                                    <td>
                                        <a href="{{ route('admin.water_meter.show', $water_meter->id) }}">{{ $water_meter->title}}</a>
                                    </td>
                                    <td>{{ $water_meter->diameter }}</td>
                                    <td>{{ $water_meter->serial_number }}</td>
                                    <td>{{ $water_meter->waterMeterPurpose }}</td>
                                    <td>{{ $water_meter->check_date }}</td>
                                    <td>{{ $water_meter->made_year }}</td>
                                    <td>{{ $water_meter->waterMeterCondition }}</td>
                                    <td>{{ $water_meter->note }}</td>
                                    <td>
                                        <a class="fas fa-edit btn-outline-warning d-inline-block"
                                           href="{{ route('admin.water_meter.edit', $water_meter->id) }}"></a>
                                        <form class="d-inline-block"
                                              action="{{ route('admin.water_meter.delete', $water_meter->id) }}" method="post">
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

