@extends('layouts.index')

@section('content')
   <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Item</h1>
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
                                        Jumlah Peminjaman</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-4">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Pinjam Barang
                          </button>
                          <!-- Modal -->
                        <form action="{{route('staff.peminjam')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pinjam Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="book_name" class="form-label">Model/Type</label>
                                                {{-- <input type="text" class="form-control" name="model" id="model"> --}}
                                                <select class="form-select" aria-label="Default select example" name="model" id="model">
                                                    <option value="-" selected>-</option>
                                                    @foreach($listItem as $li)
                                                    <option value="{{ $li->item_name }}.{{ $li->id }}">{{ $li->item_name }} | {{ $li->serial_number }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="book_author" class="form-label">User</label>
                                                {{-- <input type="text" class="form-control" id="user" name="user"> --}}
                                                <select class="form-select" aria-label="Default select example" name="user" id="user">
                                                    <option value="-" selected>-</option>
                                                    @foreach($listUser as $lu)
                                                    <option value="{{ $lu->name }}.{{ $lu->id }}">{{ $lu->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="book_author" class="form-label">Status</label>
                                                <select class="form-select" aria-label="Default select example" name="status" id="status">
                                                    <option value="stok" selected>Stok</option>
                                                    <option value="Dipakai">Dipakai</option>
                                                </select>
                                            </div> --}}
                                            <div class="mb-3">
                                                <label for="book_author" class="form-label">Details</label>
                                                <input type="text" class="form-control" id="details" name="details">
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="book_author" class="form-label">Spesifikasi</label>
                                                <input type="text" class="form-control" id="specs" name="specs">
                                            </div> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submits" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModal">
                            Barang Keluar
                        </button>
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#exampleModal">
                            Barang Pindah
                        </button>
                    </div>
                </div>
                <div class="col-8">
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
                </div>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="row">
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Model/Type</th>
                            <th scope="col">Serial Number</th>
                            <th scope="col">FA PC / Notebook</th>
                            <th scope="col">User</th>
                            <th scope="col">Unit</th>
                            <th scope="col">User Role</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $i)
                            <tr>     
                                <th scope="row">{{$loop->iteration}}</th>
                                {{-- <td>{{ $i->detail_item->first()->item_name}}</td> --}}
                                <td>{{$i->detail_item->first()->detail_items->item_brand." ".$i->detail_item->first()->detail_items->item_type}}</td>
                                <td>{{ $i->serial_number }}</td>
                                <td>{{ $i->fa_pc }}</td>
                                <td>{{ $i->user }}</td>
                                <td>{{ $i->unit }}</td>
                                <td>{{ $i->user_role }}</td>
                                {{-- <td>{{ $i->status }}</td> --}}
                                <td>{{ $i->details }}</td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    {{-- <button class="btn btn-danger">Delete</button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection