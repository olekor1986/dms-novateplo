@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Pump</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Pump</li>
                        <li class="breadcrumb-item active">Edit</li>
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
                <form action="{{ route('admin.pump.update', $pump->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="pump_type_id">Type
                            <input class="form-control" value="{{ $pump->pump_type_id ?? old('pump_type_id') }}" type="text" name="pump_type_id">
                        </label>
                        <label for="title">Title
                            <input class="form-control" value="{{ $pump->title ?? old('title') }}" type="text" name="title">
                        </label>

                        <label for="serial_number">Serial Number
                            <input class="form-control" value="{{ $pump->serial_number ?? old('serial_number') }}" type="text"
                                   name="serial_number">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="in_work">In work
                            <select name="in_work" class="custom-select form-control" id="exampleSelectBorder">
                                <option value="1" {{ $pump->in_work == 1 ? ' selected' : ''}}>Yes</option>
                                <option value="0" {{ $pump->in_work == 0 ? ' selected' : ''}}>No</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="source_id">Source
                            <select name="source_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($sources as $source)
                                    <option {{ $source->id === $pump->source->id ? ' selected' : ''}}
                                            value="{{ $source->id }}">{{ $source->address }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="max_capacity">Max Cap
                            <input class="form-control" value="{{ $pump->max_capacity ?? old('max_capacity') }}" type="text"
                                   name="max_capacity">
                        </label>
                        <label for="max_pressure">Max Press
                            <input class="form-control" value="{{ $pump->max_pressure ?? old('max_pressure') }}" type="text"
                                   name="max_pressure">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="engine_power">Engine Power
                            <input class="form-control" value="{{ $pump->engine_power ?? old('engine_power') }}" type="text"
                                   name="engine_power">
                        </label>
                        <label for="engine_speed">Engine Speed
                            <input class="form-control" value="{{ $pump->engine_speed ?? old('engine_speed') }}" type="text"
                                   name="engine_speed">
                        </label>
                        <label for="engine_title">Engine Title
                            <input class="form-control" value="{{ $pump->engine_title ?? old('engine_title') }}" type="text"
                                   name="engine_title">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="shaft_diam">Shaft Diam
                            <input class="form-control" value="{{ $pump->shaft_diam ?? old('shaft_diam') }}" type="number" name="shaft_diam">
                        </label>
                        <label for="front_bearing_id">Front Bearing
                            <input class="form-control" value="{{ $pump->front_bearing_id ?? old('front_bearing_id') }}" type="text"
                                   name="front_bearing_id">
                        </label>
                        <label for="rear_bearing_id">Rear Bearing
                            <input class="form-control" value="{{ $pump->rear_bearing_id ?? old('rear_bearing_id') }}" type="text"
                                   name="rear_bearing_id">
                        </label>
                        <label for="mechanical_seal_id">Mechanical Seal
                            <input class="form-control" value="{{ $pump->mechanical_seal_id ?? old('mechanical_seal_id') }}" type="text"
                                   name="mechanical_seal_id">
                        </label>
                    </div>
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

