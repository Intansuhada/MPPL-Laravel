<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Admin Dashboard</title>
    <style>
    /* Add your custom CSS styles here */

    body {

        font-family: 'Lato';

    }

    .adminbck {
        background-color: #088DF7;
    }

    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #088DF7;
        padding-top: 20px;
    }

    .sidebar a {
        padding: 10px 20px;
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        display: block;
    }

    .sidebar a:hover {
        background-color: #DBDADA;
    }

    .content {
        margin-left: 260px;
        padding: 20px;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="{{ route('admin.home') }}">Home</a>
        <a href="{{ route('admin.berita') }}">Berita</a>
        <a href="{{ route('admin.datadosen') }}">Data</a>
        <a href="{{ route('admin.buku') }}">Buku</a>
        <a href="{{ route('admin.peminjaman') }}">Peminjaman</a>
        <a href="{{ route('admin.aktivitas') }}">Aktivitas</a>
        <a href="{{ route('admin.lulusan')}}">Lulusan</a>
        <a class="mt-lg-5" href="{{ route('logout') }}">Logout</a>
    </div>

    <div class="content">
        <div class="adminbck rounded px-3 py-2">
            <h1 class="text-white font-weight-bolder">Selamat Datang!</h1>
            <h5 class="text-white">{{ Auth::user()->name }}</h5>
        </div>

        @if (Session::get('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-danger">
            <strong>Failed!</strong> {{ Session::get('failed') }}
        </div>
        @endif

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tambah Dosen</h5>
                        <form action="{{ route('postTambahDataDosen') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Nama</label>
                                <input type="text" class="form-control border border-secondary form-control" name="nama"
                                    required value="{{ old('nama') }}">
                                <span class="text-danger">
                                    @error('nama')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Prodi</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="prodi" required value="{{ old('prodi') }}">
                                <span class="text-danger">
                                    @error('prodi')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Gambar</label>
                                <input class="form-control" type="file" name="gambar">
                                <div class="form-text">Maksimal ukuran
                                    gambar 5MB
                                </div>
                            </div><br>
                            <button type="submit" class="btn btn-success mt-5">Tambah Data Dosen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </d
iv>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>