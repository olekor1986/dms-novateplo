@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Burner Types</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Burner Type</li>
                        <li class="breadcrumb-item active">Index</li>
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
                <p>
                    <a class="btn btn-primary d-block" href="{{ route('admin.burner_type.create') }}">Create Burner
                        Type</a>
                </p>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Burner Types</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="index_table" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($burner_types as $burner_type)
                                <tr>
                                    <td>{{ $burner_type->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.burner_type.show', $burner_type->id) }}">{{ $burner_type->title }}</a>
                                    </td>
                                    <td>{{ $burner_type->created_at }}</td>
                                    <td>{{ $burner_type->updated_at }}</td>
                                    <td>
                                        <a class="fas fa-edit btn-outline-warning d-inline-block"
                                           href="{{ route('admin.burner_type.edit', $burner_type->id) }}"></a>
                                        <form class="d-inline-block"
                                              action="{{ route('admin.burner_type.delete', $burner_type->id) }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="fas fa-trash btn-outline-danger border-0 bg-transparent"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

