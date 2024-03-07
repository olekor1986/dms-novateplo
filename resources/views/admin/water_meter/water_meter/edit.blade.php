@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Water Meter</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Water Meter</li>
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
                <form action="{{ route('admin.water_meter.update', $water_meter->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <div class="form-group">
                            <label for="title">Title
                                <input class="form-control" value="{{ $water_meter->title ?? old('title') }}" type="text" name="title">
                            </label>
                            <label for="diameter">Diameter
                                <select name="diameter" class="custom-select form-control" id="exampleSelectBorder">
                                    @foreach($data['diameters'] as $diameter)
                                        <option {{ $diameter === $water_meter->diameter ? ' selected' : ''}}
                                                value="{{ $diameter }}">{{ $diameter }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label for="serial_number">Serial Number
                                <input class="form-control" value="{{ $water_meter->serial_number ?? old('serial_number') }}" type="text"
                                       name="serial_number">
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="purpose">Purpose
                                <select name="purpose" class="custom-select form-control" id="exampleSelectBorder">
                                    @foreach($data['purposes'] as $key => $purpose)
                                        <option {{ $key === $water_meter->purpose ? ' selected' : ''}}
                                                value="{{ $key }}">{{ $purpose }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label for="condition">Condition
                                <select name="condition" class="custom-select form-control" id="exampleSelectBorder">
                                    @foreach($data['conditions'] as $key => $condition)
                                        <option {{ $key === $water_meter->condition ? ' selected' : ''}}
                                                value="{{ $key }}">{{ $condition }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="source_id">Source
                                <select name="source_id" class="custom-select form-control" id="exampleSelectBorder">
                                    @foreach($data['sources'] as $source)
                                        <option {{ $source->id === $water_meter->source->id ? ' selected' : ''}}
                                                value="{{ $source->id }}">{{ $source->address }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="check_date">Check Date
                                <input class="form-control" value="{{ $water_meter->check_date ?? old('check_date') }}" type="date"
                                       name="check_date">
                            </label>
                            <label for="made_year">Year Of Made
                                <input class="form-control" value="{{ $water_meter->made_year ?? old('made_year') }}" type="number" min="2005" max="2050" step="1"
                                       name="made_year">
                            </label>
                            <label for="note">Note
                                <input class="form-control" value="{{ $water_meter->note ?? old('note') }}" type="text"
                                       name="note">
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

