@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Heat Source</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Heat Source</li>
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
                <form action="{{ route('admin.source.update', $source->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="address">Address
                            <input class="form-control" value="{{ $source->address ?? old('address') }}" type="text" name="address">
                        </label>
                        <label for="connected_power">Connected Power
                            <input class="form-control" value="{{ $source->connected_power ?? old('connected_power') }}" type="text"
                                   name="connected_power">
                        </label>
                        <label for="gps">GPS
                            <input class="form-control" value="{{ $source->gps ?? old('gps') }}" type="text" name="gps">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="user_id">Staff
                            <select name="user_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($users as $user)
                                    <option {{ $user->id === $source->user->id ? ' selected' : ''}}
                                            value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="source_fuel_id">Fuel
                            <select name="source_fuel_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($source_fuels as $source_fuel)
                                    <option {{ $source_fuel->id === $source->source_fuel->id ? ' selected' : ''}}
                                            value="{{ $source_fuel->id }}">{{ $source_fuel->title }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="source_type_id">Type
                            <select name="source_type_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($source_types as $source_type)
                                    <option {{ $source_type->id === $source->source_type->id ? ' selected' : ''}}
                                            value="{{ $source_type->id }}">{{ $source_type->title }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="city_district_id">District
                            <select name="city_district_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($city_districts as $city_district)
                                    <option {{ $city_district->id === $source->city_district->id ? ' selected' : ''}}
                                            value="{{ $city_district->id }}">{{ $city_district->title }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="in_work">In work
                            <select name="in_work" class="custom-select form-control" id="exampleSelectBorder">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </label>
                        <label for="monitoring">Monitoring
                            <select name="monitoring" class="custom-select form-control" id="exampleSelectBorder">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </label>
                        <label for="balance">Balance
                            <select name="balance" class="custom-select form-control" id="exampleSelectBorder">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
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

