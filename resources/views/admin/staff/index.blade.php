@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Staffs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Staff</li>
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
            <div class="row w-75">
                <p>
                    <a class="btn btn-primary" href="{{ route('admin.staff.create') }}">Create Staff</a>
                </p>
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($staffs as $staff)
                        <tr>
                            <td>{{ $staff->id }}</td>
                            <td><a href="{{ route('admin.staff.show', $staff->id) }}">{{ $staff->title }}</a></td>
                            <td>{{ $staff->created_at }}</td>
                            <td>{{ $staff->updated_at }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.staff.edit', $staff->id) }}">Edit</a></td>
                            </td>
                            <td>
                                <form action="{{ route('admin.staff.delete', $staff->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

