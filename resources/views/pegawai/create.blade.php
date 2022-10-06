@extends('dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Pegawai </h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Pegawai</a>
                        </li>

                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.content-header -->
          

    <!-- Main content -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pegawai.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">NIP</label>
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nomor_induk_pegawai" value="{{ old('nomor_induk_pegawai') }}" placeholder="Masukkan NIP"> 
                                        
                                        @error('nomor_induk_pegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Nama Pegawai</label>
                                        <input type="text" class="form-control @error('nama_manager') is-invalid @enderror" name="nama_pegawai" value="{{ old('nama_pegawai') }}" placeholder="Masukkan Nama Pegawai">
                                        
                                        @error('nama_pegawai')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Jumlah Pegawai</label>
                                    <input type="number" class="form-control @error('jumlah_pegawai') is-invalid @enderror" name="jumlah_pegawai" value="{{ old('jumlah_pegawai') }}" placeholder="Masukkan Jumlah Pegawai">
                                        
                                    @error('jumlah_pegawai')
                                        
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                        @enderror
                                    </div> 
                                </div> 

                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            </form>
                        </div><!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>
@endsection




