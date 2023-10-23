@extends('layouts.index')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List User</h1>
</div>


<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div
                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah User</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user->count()}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-8">
                     {{-- navbar --}}
                     @include('layouts.navbar-setting')
                     {{-- end navbar --}}
                </div>
                <div class="col-4">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add User
                          </button>
                        <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="book_name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="book_author" class="form-label">Unit</label>
                                        {{-- <input type="text" class="form-control" id="unit" name="unit"> --}}
                                        <select class="form-select" aria-label="Default select example" name="unit" id="unit">
                                            @foreach ($unit as $u)                                                
                                                <option value="-" selected>-</option>
                                                <option value="{{ $u->unit }}" >{{ $u->unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="book_release" class="form-label">Role</label>
                                        {{-- <input type="text" class="form-control" id="role" name="role"> --}}
                                        <select class="form-select" aria-label="Default select example" name="role" id="role">
                                            @foreach ($role as $r)                                                
                                                <option value="-" selected>-</option>
                                                <option value="{{ $r->role_name }}" >{{ $r->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-8">
                    <div class="input-group mb-3">
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"
                                style="border:1px solid #4e73df;border-radius:5px">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->unit }}</td>
                                <td><span class="bold">{{ $user->role }}</span></td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#exampleModal1">Edit User Info</button>
                                        </div>
                                        <div class="col-5">
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal1">Delete User</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <th scope="row">1</th>
                            <td>SM-918B</td>
                            <td>Samsung S23 Ultra</td>
                            <td>Samsung S23 Ultra</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal1">Update Info</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#exampleModal1">Update Status</button>
                                    </div>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


@endsection