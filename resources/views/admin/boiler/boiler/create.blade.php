@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Boiler</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Boiler</li>
                        <li class="breadcrumb-item active">Create</li>
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
                <form action="{{ route('admin.boiler.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title
                            <input class="form-control" value="{{ old('title') }}" type="text" name="title">
                        </label>
                        <label for="source_id">Source
                            <select name="source_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($sources as $source)
                                    <option value="{{ $source->id }}">{{ $source->address }}</option>
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
                                    <option value="{{ $boiler_fuel->id }}">{{ $boiler_fuel->title }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="title">Power
                            <input class="form-control" value="{{ old('power') }}" type="number" name="power">
                        </label>
                        <label for="efficient">Efficient
                            <input class="form-control" value="{{ old('efficient') }}" type="number" name="efficient">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="burner_type_id">Burner Type
                            <select name="burner_type_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($burner_types as $burner_type)
                                    <option value="{{ $burner_type->id }}">{{ $burner_type->title }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="mount_year">Mount Year
                            <input class="form-control" value="2010" type="number" min="1900" max="2099" step="1"
                                   name="mount_year">
                        </label>
                        <label for="launch_year">Launch Year
                            <input class="form-control" value="2010" type="number" min="1900" max="2099" step="1"
                                   name="launch_year">
                        </label>
                        <label for="check_date">Check Date
                            <input class="form-control" value="{{ old('check_date') }}" type="date" name="check_date">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="index_number">Index Number
                            <input class="form-control" value="{{ old('index_number') }}" type="text" name="index_number">
                        </label>
                        <label for="serial_number">Serial Number
                            <input class="form-control" value="{{ old('serial_number') }}" type="text" name="serial_number">
                        </label>
                        <label for="reg_number">Reg Number
                            <input class="form-control" value="{{ old('reg_number') }}" type="text" name="reg_number">
                        </label>
                        <label for="in_work">In work
                            <select name="in_work" class="custom-select form-control" id="exampleSelectBorder">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </label>
                    </div>
                    <button class="btn btn-success">Create</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

