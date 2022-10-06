@extends('dashboard')

@section('content')
    <!-- LIST nama di si debar-->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pegawai</h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('pegawai')}}">Pegawai</a>
                        </li>

                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div> <!-- /.col -->
                
            </div> <!-- /.row -->
           
        </div><!-- /.container-fluid -->

    </div> <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                             <a href="{{ route('pegawai.create') }}" class="btn btn-md btn-success mb-3">Tambah Pegawai</a>
                            <div class="table-responsive p-0">

                            <table class="table table-hover text-nowrap">

                                <thead>
                                    <tr>
                                        <th class="text-center">NIP</th>
                                        <th class="text-center">Nama Pegawai</th>
                                        <th class="text-center">Departemen</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Telepon</th>
                                        <th class="text-center">Gender</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($pegawai as $index => $item)
                                    <tr>
                                    <td class="text-center">{{$item->nomor_induk_pegawai }}</td>
                                            <td class="text-center">{{$item->nama_pegawai }}</td>
                                            <td class="text-center">{{$item->departemen->nama_departemen }}</td>
                                            <td class="text-center">{{$item->email }}</td>
                                            <td class="text-center">{{$item->telepon }}</td>
                                            <td class="text-center"> {{ ($item->gender) == 1 ? "wanita" : "pria" }} </td>
                                            <td class="text-center">{{ ($item->status) == 1 ? "aktif" : "Tidak Aktif" }} </td>
                                            <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pegawai.destroy', $item->id) }}" method="Post">
                                                <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf

                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form> 
                                        </td>
                                    </tr>

                                    @empty
                                    <div class="alert alert-danger">
                                        Data Pegawai belum tersedia
                                    </div>

                                    @endforelse
                                </tbody>
                            </table>
                            <div class="row justify-content-center">
                                {{$pegawai->links()}}
                            </div>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>  <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>
@endsection