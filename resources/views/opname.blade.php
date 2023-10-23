@extends('layouts.index')

@section('content')
   <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Stock Opname</h1>
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
                                        Total Items</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">123</div>
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
                            Add Action
                          </button>
                          <!-- Modal -->
                        <form action="{{route('staff.items')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="book_name" class="form-label">Merk</label>
                                                <input type="text" class="form-control" name="merk" id="merk">
                                            </div>
                                            <div class="mb-3">
                                                <label for="book_name" class="form-label">Type</label>
                                                <input type="text" class="form-control" name="type" id="type">
                                            </div>
                                            <div class="mb-3">
                                                <label for="book_author" class="form-label">Processor</label>
                                                <input type="text" class="form-control" id="processor" name="processor">
                                            </div>
                                            <div class="mb-3">
                                                <label for="book_author" class="form-label">RAM</label>
                                                <select class="form-select">
                                                    <option value="-" selected>-</option>
                                                    <option value="4GB">4 GB</option>
                                                    <option value="8GB">8 GB</option>
                                                    <option value="16GB">16 GB</option>
                                                    <option value="32GB">32 GB</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="book_author" class="form-label">Storage</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option value="-" selected>-</option>
                                                    <option value="ssd128">SSD 128GB</option>
                                                    <option value="ssd250">SSD 250GB</option>
                                                    <option value="ssd512">SSD 512GB</option>
                                                    <option value="ssd1000">SSD 1TB</option>
                                                    <option value="hdd512">HDD 512GB</option>
                                                    <option value="hdd1000">HDD 1TB</option>
                                                    <option value="hdd2000">HDD 2TB</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="book_author" class="form-label">Details</label>
                                                <input type="text" class="form-control" id="details" name="details">
                                            </div>
                                            <div class="mb-3">
                                                <input type="checkbox" id="mouse" name="mouse">
                                                <label for="book_author" class="form-label">Mouse</label>
                                                
                                                <input type="checkbox" id="keyboard" name="keyboard">
                                                <label for="book_author" class="form-label">Keyboard</label>
                                                
                                                <input type="checkbox" id="webcam" name="webcam">
                                                <label for="book_author" class="form-label">Webcam</label>

                                                <input type="checkbox" id="audio" name="audio">
                                                <label for="book_author" class="form-label">Headset/Speaker</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submits" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Barang Masuk
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="book_name" class="form-label">aaaaaa</label>
                                            <input type="text" class="form-control" wire:model="title" name="book_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="book_author" class="form-label">Penerbit</label>
                                            <input type="text" class="form-control" id="book_author" name="book_author"
                                                placeholder="Penerbit">
                                        </div>
                                        <div class="mb-3">
                                            <label for="book_release" class="form-label">Tahun
                                                Terbit</label>
                                            <input type="text" class="form-control" id="book_release" name="book_release"
                                                placeholder="Tahun Terbit">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan
                                            Buku</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
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
                            <th scope="col">SN</th>
                            <th scope="col">FA</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Type</th>
                            <th scope="col">User</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Spec</th>
                            <th scope="col">Location</th>
                            <th scope="col">Details</th>
                            <th scope="col">Date</th>
                            <th scope="col">PIC Check</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>SGH411QZTS</td>
                            <td>201404000144</td>
                            <td>HP</td>
                            <td>ProDesk 400 G4</td>
                            <td>Jason</td>
                            <td>IT Internship</td>
                            <td>Karyawan</td>
                            <td>Core i3 - 4 GB - HDD 500</td>
                            <td>-</td>
                            <td>Back Office Library</td>
                            <td>13-10-2023 15:03</td>
                            <td>Sabitha</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>SGH673QZKS</td>
                            <td>202204525384</td>
                            <td>HP</td>
                            <td>ProDesk 500 G5</td>
                            <td>Jendra</td>
                            <td>IT Internship</td>
                            <td>Karyawan</td>
                            <td>Core i7 - 32 GB - SSD 1000</td>
                            <td>-</td>
                            <td>Back Office Library</td>
                            <td>16-10-2023 13:42</td>
                            <td>Sabitha</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                       {{-- @foreach ($item as $i)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $i->model }}</td>
                                <td>{{ $i->serial_number }}</td>
                                <td>{{ $i->fa_pc }}</td>
                                <td>{{ $i->user }}</td>
                                <td>{{ $i->unit }}</td>
                                <td>{{ $i->user_role }}</td>
                                <td>{{ $i->status }}</td>
                                <td>{{ $i->details }}</td>
                                <td>{{ $i->specs }}</td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection