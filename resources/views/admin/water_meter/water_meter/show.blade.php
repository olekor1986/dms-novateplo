@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Water Meter</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Water Meter</li>
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
                                <dd class="col-sm-8">{{ $water_meter->id }}</dd>
                                <dt class="col-sm-4">Source</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ route('admin.source.show', $water_meter->source->id) }}">{{ $water_meter->source->address}}</a>
                                </dd>
                                <dt class="col-sm-4">Title</dt>
                                <dd class="col-sm-8">{{ $water_meter->title }}</dd>
                                <dt class="col-sm-4">Diameter</dt>
                                <dd class="col-sm-8">{{ $water_meter->diameter }}</dd>
                                <dt class="col-sm-4">Serial Number</dt>
                                <dd class="col-sm-8">{{ $water_meter->serial_number }}</dd>
                                <dt class="col-sm-4">Purpose</dt>
                                <dd class="col-sm-8">{{ $water_meter->waterMeterPurpose }}</dd>
                                <dt class="col-sm-4">Check Date</dt>
                                <dd class="col-sm-8">{{ $water_meter->check_date }}</dd>
                                <dt class="col-sm-4">Year Of Made</dt>
                                <dd class="col-sm-8">{{ $water_meter->made_year }}</dd>
                                <dt class="col-sm-4">Condition</dt>
                                <dd class="col-sm-8">{{ $water_meter->waterMeterCondition }}</dd>
                                <dt class="col-sm-4">Note</dt>
                                <dd class="col-sm-8">{{ $water_meter->note }}</dd>
                                @if(isset($water_meter->created_by_user->first_name))
                                    <dt class="col-sm-4">Created</dt>
                                    <dd class="col-sm-8">{{ $water_meter->created_at  . ' by ' . $water_meter->created_by_user->first_name
                                . ' ' . $water_meter->created_by_user->last_name }}</dd>
                                @endif
                                @if(isset($water_meter->updated_by_user->first_name))
                                    <dt class="col-sm-4">Updated</dt>
                                    <dd class="col-sm-8">{{ $water_meter->updated_at . ' by ' . $water_meter->updated_by_user->first_name
                                . ' ' . $water_meter->updated_by_user->last_name }}</dd>
                                @endif
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Values</h3>
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
                                    <th>Value</th>
                                    <th>Date</th>
                                    <th>After Check</th>
                                    <th>Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($water_meter_values as $water_meter_value)
                                    <tr>
                                        <td>{{ $water_meter_value->id }}</td>
                                        <td>{{ $water_meter_value->value }}</td>
                                        <td>{{ $water_meter_value->date }}</td>
                                        <td>{{ $water_meter_value->after_check }}</td>
                                        <td>{{ $water_meter_value->note }}</td>
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
                            <a class="btn btn-app bg-info" href="{{ route('admin.water_meter.create') }}">
                                <i class="fas fa-plus"></i>Create
                            </a>
                            <a class="btn btn-app bg-warning"
                               href="{{ route('admin.water_meter.edit', $water_meter->id) }}">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <form class="d-inline-block"
                                  action="{{ route('admin.water_meter.delete', $water_meter->id) }}" method="post">
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
                            <h3 class="card-title">More water meters from this source</h3>
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
                                @foreach($water_meter->source->water_meters as $water_meter_in_source)
                                    <li>
                                        <a href="{{ route('admin.water_meter.show', $water_meter_in_source->id) }}">{{ $water_meter_in_source->title}}</a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Add Value</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('admin.water_meter_value.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="water_meter_id" value="{{ $water_meter->id }}">
                                <div class="form-group">
                                    <label for="value">Value
                                        <input class="form-control" value="{{ old('value') }}" type="text" name="value">
                                    </label>
                                    <label for="date">Date
                                        <input class="form-control" value="{{ old('date') }}" type="month"
                                               name="date" >
                                    </label>
                                    <label for="note">Note
                                        <input class="form-control" value="{{ old('note') }}" type="text"
                                               name="note">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="after_check">After Check
                                        <select name="after_check" class="custom-select form-control" id="exampleSelectBorder">
                                            <option value="0" selected>No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </label>
                                </div>
                                <button class="btn btn-success">Create</button>
                            </form>
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

