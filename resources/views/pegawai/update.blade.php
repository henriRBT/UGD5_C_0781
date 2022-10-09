@extends('dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Pegawai</h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Pegawai</a>
                        </li>

                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.content-header -->
     
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



    <!-- Main content -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pegawai.update', $pegawai->id) }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Nomor Induk Pegawai</label>
                                        <input type="text" class="form-control @error('nomor_induk_pegawai') is-invalid @enderror" name="nomor_induk_pegawai" value=" {{$pegawai->nomor_induk_pegawai}}" placeholder="Masukkan Nomor Induk Pegawai"> 
                                        
                                        @error('nomor_induk_pegawai')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>

                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Nama Pegawai</label>
                                        <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" name="nama_pegawai"  value="{{$pegawai->nama_pegawai}}" placeholder="Masukkan Nama Pegawair">
                                        
                                        @error('nama_pegawai')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value=" {{$pegawai->email}}" placeholder="Masukkan Email"> 
                                        
                                    @error('email')
                                        
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                        @enderror
                                    </div> 
                                </div> 
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Telepon</label>
                                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value=" {{$pegawai->telepon}}" placeholder="Masukkan Nomor Telepon"> 
                                        
                                        @error('telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            </form>
                        </div><!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>
@endsection



