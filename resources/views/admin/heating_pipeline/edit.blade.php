@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Heating Pipeline</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Heating Pipeline</li>
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
                <form action="{{ route('admin.heating_pipeline.update', $heating_pipeline->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="source_id">Source
                            <select name="source_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['sources'] as $source)
                                    <option {{ $source->id === $heating_pipeline->source->id ? ' selected' : ''}}
                                            value="{{ $source->id }}">{{ $source->address }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="pipe_start">Start Point
                            <input class="form-control" value="{{ $heating_pipeline->pipe_start ?? old('pipe_start') }}" type="text" name="pipe_start">
                        </label>
                        <label for="pipe_end">End Point
                            <input class="form-control" value="{{ $heating_pipeline->pipe_end ?? old('pipe_end') }}" type="text" name="pipe_end">
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
                                    <option {{ $pipe_diameter === $heating_pipeline->direct_diam ? ' selected' : ''}}
                                            value="{{ $pipe_diameter }}">{{ $pipe_diameter }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="reverse_diam">Reverse Diam
                            <select name="reverse_diam" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['pipe_diameters'] as $pipe_diameter)
                                    <option {{ $pipe_diameter === $heating_pipeline->reverse_diam ? ' selected' : ''}}
                                            value="{{ $pipe_diameter }}">{{ $pipe_diameter }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="purpose_type">Purpose Type
                            <select name="purpose_type" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['purpose_types'] as $key => $purpose_type)
                                    <option {{ $key === $heating_pipeline->purpose_type ? ' selected' : ''}}
                                            value="{{ $key }}">{{ $purpose_type }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="laying_type">Laying Type
                            <select name="laying_type" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['laying_types'] as $key => $laying_type)
                                    <option {{ $key === $heating_pipeline->laying_type ? ' selected' : ''}}
                                            value="{{ $key }}">{{ $laying_type }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="length">Length
                            <input class="form-control" value="{{ $heating_pipeline->length ?? old('length') }}" type="text" name="length">
                        </label>
                        <label for="height">Height
                            <input class="form-control" value="{{ $heating_pipeline->height ?? old('height') }}" type="text" name="height">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="ins_type">Insulation Type
                            <select name="ins_type" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['ins_types'] as $key => $ins_type)
                                    <option {{ $key === $heating_pipeline->ins_type ? ' selected' : ''}}
                                            value="{{ $key }}">{{ $ins_type }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="ins_cond">Insulation Condition
                            <select name="ins_cond" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($data['ins_conditions'] as $key => $ins_cond)
                                    <option {{ $key === $heating_pipeline->ins_cond ? ' selected' : ''}}
                                            value="{{ $key }}">{{ $ins_cond }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="ins_thick">Insulation Thick
                            <input class="form-control" value="{{ $heating_pipeline->ins_thick ?? old('ins_thick') }}" type="text" name="ins_thick">
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

