@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">User</li>
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
                <form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">First Name
                            <input class="form-control" value="{{ $user->first_name ?? old('first_name') }}" type="text" name="first_name">
                        </label>
                        <label for="title">Last Name
                            <input class="form-control" value="{{ $user->last_name ?? old('last_name') }}" type="text" name="last_name">
                        </label>
                    </div>
                    <div class="form-group">
                        <img class="p-3" src="{{ asset('storage/' . $user->avatar) }}" alt="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Avatar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile" value="{{ $user->avatar }}">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Work Phone
                            <input class="form-control" value="{{ $user->w_phone ?? old('w_phone') }}" type="text" name="w_phone">
                        </label>
                        <label for="title">Mobile Phone
                            <input class="form-control" value="{{ $user->m_phone ?? old('m_phone') }}" type="text" name="m_phone">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="title">Role
                            <select name="role_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($roles as $role)
                                    <option {{ $role->id === $user->role->id ? ' selected' : ''}}
                                    value="{{ $role->id }}">{{ $role->title }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="title">Staff Title
                            <select name="staff_id" class="custom-select form-control" id="exampleSelectBorder">
                                @foreach($staffs as $staff)
                                    <option {{ $staff->id === $user->staff->id ? ' selected' : ''}}
                                    value="{{ $staff->id }}">{{ $staff->title }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="title">E-mail
                            <input class="form-control" value="{{ $user-> email ?? old('email') }}" type="email" name="email">
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

