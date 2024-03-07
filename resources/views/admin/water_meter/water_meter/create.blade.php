@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Water Meter</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Water Meter</li>
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
                <form action="{{ route('admin.water_meter.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title
                            <input class="form-control" value="{{ old('title') }}" type="text" name="title">
                        </label>
                        <label for="diameter">Diameter
                            <select name="diameter" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['diameters'] as $diameter)
                                    <option value="{{ $diameter }}">{{ $diameter }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="serial_number">Serial Number
                            <input class="form-control" value="{{ old('serial_number') }}" type="text"
                                   name="serial_number">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose
                            <select name="purpose" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['purposes'] as $key => $purpose)
                                    <option value="{{ $key }}">{{ $purpose }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="condition">Condition
                            <select name="condition" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['conditions'] as $key => $condition)
                                    <option value="{{ $key }}">{{ $condition }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="source_id">Source
                            <select name="source_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['sources'] as $source)
                                    <option value="{{ $source->id }}">{{ $source->address }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="check_date">Check Date
                            <input class="form-control" value="{{ old('check_date') }}" type="date"
                                   name="check_date">
                        </label>
                        <label for="made_year">Year Of Made
                            <input class="form-control" value="2020" type="number" min="2005" max="2050" step="1"
                                   name="made_year">
                        </label>
                        <label for="note">Note
                            <input class="form-control" value="{{ old('note') }}" type="text"
                                   name="note">
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

