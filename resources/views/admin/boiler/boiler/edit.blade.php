@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Boiler</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Boiler</li>
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
                <form action="{{ route('admin.boiler.update', $boiler->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">Title
                            <input class="form-control" value="{{ $boiler->title ?? old('title') }}" type="text" name="title">
                        </label>
                        <label for="source_id">Source
                            <select name="source_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($sources as $source)
                                    <option {{ $source->id === $boiler->source->id ? ' selected' : ''}}
                                            value="{{ $source->id }}">{{ $source->address }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="in_work">Energy Carrier
                            <select name="energy_carrier" class="custom-select form-control" id="exampleSelectBorder">
                                <option value="1" selected>Water</option>
                                <option value="2">Steam</option>
                            </select>
                        </label>
                        <label for="boiler_fuel_id">Fuel
                            <select name="boiler_fuel_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($boiler_fuels as $boiler_fuel)
                                    <option {{ $boiler_fuel->id === $boiler->boiler_fuel->id ? ' selected' : ''}}
                                            value="{{ $boiler_fuel->id }}">{{ $boiler_fuel->title }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="title">Power
                            <input class="form-control" value="{{ $boiler->power ?? old('power') }}" type="number" name="power">
                        </label>
                        <label for="efficient">Efficient
                            <input class="form-control" value="{{ $boiler->efficient ?? old('efficient') }}" type="number" name="efficient">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="mount_year">Mount Year
                            <input class="form-control" value="{{ $boiler->mount_year ?? old('mount_year') }}" type="number" min="1900" max="2099" step="1"
                                   name="mount_year">
                        </label>
                        <label for="launch_year">Launch Year
                            <input class="form-control" value="{{ $boiler->launch_year ?? old('launch_year') }}" type="number" min="1900" max="2099" step="1"
                                   name="launch_year">
                        </label>
                        <label for="check_date">Check Date
                            <input class="form-control" value="{{ $boiler->check_date ?? old('check_date') }}" type="date" name="check_date">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="index_number">Index Number
                            <input class="form-control" value="{{ $boiler->index_number ?? old('index_number') }}" type="text" name="index_number">
                        </label>
                        <label for="serial_number">Serial Number
                            <input class="form-control" value="{{ $boiler->serial_number ?? old('serial_number') }}" type="text" name="serial_number">
                        </label>
                        <label for="reg_number">Reg Number
                            <input class="form-control" value="{{ $boiler->reg_number ?? old('reg_number') }}" type="text" name="reg_number">
                        </label>
                        <label for="in_work">In work
                            <select name="in_work" class="custom-select form-control" id="exampleSelectBorder">
                                <option value="1" {{ $boiler->in_work == 1 ? ' selected' : ''}}>Yes</option>
                                <option value="0" {{ $boiler->in_work == 0 ? ' selected' : ''}}>No</option>
                            </select>
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

