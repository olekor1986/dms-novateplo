@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Water Meter Value</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Water Meter Value</li>
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
                <form action="{{ route('admin.water_meter_value.update', $water_meter_value->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="value">Value
                            <input class="form-control" value="{{ $water_meter_value->value ?? old('value') }}" type="text" name="value">
                        </label>
                        <label for="date">Date
                            <input class="form-control" value="{{ $water_meter_value->date ?? old('date') }}" type="month"
                                   name="date">
                        </label>
                        <label for="note">Note
                            <input class="form-control" value="{{ $water_meter_value->note ?? old('note') }}" type="text"
                                   name="note">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="after_check">After Check
                            <select name="after_check" class="custom-select form-control" id="exampleSelectBorder">
                                <option value="1" {{ $water_meter_value->after_check == 1 ? ' selected' : ''}}>Yes</option>
                                <option value="0" {{ $water_meter_value->after_check == 0 ? ' selected' : ''}}>No</option>
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

