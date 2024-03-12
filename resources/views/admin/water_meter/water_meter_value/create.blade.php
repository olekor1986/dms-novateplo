@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Water Meter Value</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Water Meter Value</li>
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
                <form action="{{ route('admin.water_meter_value.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="water_meter_id">Water Meter
                            <select name="water_meter_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['water_meters'] as $water_meter)
                                    <option value="{{ $water_meter->id }}">
                                        {{ $water_meter->source->address . ' - '. $water_meter->title }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
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
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

