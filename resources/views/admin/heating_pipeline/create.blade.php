@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Heating Pipeline</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Heating Pipeline</li>
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
                <form action="{{ route('admin.heating_pipeline.store') }}" method="post">
                    @csrf
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
                        <label for="pipe_start">Start Point
                            <input class="form-control" value="{{ old('pipe_start') }}" type="text" name="pipe_start">
                        </label>
                        <label for="pipe_end">End Point
                            <input class="form-control" value="{{ old('pipe_end') }}" type="text" name="pipe_end">
                        </label>
                        <label for="build_year">Build Year
                            <input class="form-control" value="2010" type="number" min="1950"
                                   max="2050" step="1"
                                   name="build_year">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="direct_diam">Direct Diam
                            <select name="direct_diam" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['pipe_diameters'] as $pipe_diameter)
                                    <option value="{{ $pipe_diameter }}">{{ $pipe_diameter }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="reverse_diam">Reverse Diam
                            <select name="reverse_diam" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['pipe_diameters'] as $pipe_diameter)
                                    <option value="{{ $pipe_diameter }}">{{ $pipe_diameter }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="purpose_type">Purpose Type
                            <select name="purpose_type" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['purpose_types'] as $key => $purpose_type)
                                    <option value="{{ $key }}">{{ $purpose_type }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="laying_type">Laying Type
                            <select name="laying_type" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['laying_types'] as $key => $laying_type)
                                    <option value="{{ $key }}">{{ $laying_type }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="length">Length
                            <input class="form-control" value="{{ old('length') }}" type="text" name="length">
                        </label>
                        <label for="height">Height
                            <input class="form-control" value="{{ old('height') }}" type="text" name="height">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="ins_type">Insulation Type
                            <select name="ins_type" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['ins_types'] as $key => $ins_type)
                                    <option value="{{ $key }}">{{ $ins_type }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="ins_cond">Insulation Condition
                            <select name="ins_cond" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['ins_conditions'] as $key => $ins_cond)
                                    <option value="{{ $key }}">{{ $ins_cond }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="ins_thick">Insulation Thick
                            <input class="form-control" value="{{ old('ins_thick') }}" type="text" name="ins_thick">
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

