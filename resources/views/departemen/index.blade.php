@extends('dashboard')

@section('content')
    <!-- LIST nama di si debar-->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Departemen</h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('departemen')}}">Departemen</a>
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
                            
                        <a href="{{ route('departemen.create') }}" class="btn btn-md btn-success mb-3">Tambah Departemen</a>
                           
                            <div class="table-responsive p-0">
                            
                            <table class="table table-hover text-nowrap">
                                
                            <thead>
                                    <tr>
                                        <th class="text-center">Nama Departemen</th>
                                        <th class="text-center">Nama Manger</th>
                                        <th class="text-center">Jumlah Pegawai</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($departemen as $index => $item)
                                    <tr>
                                        <td class="text-center">{{$item->nama_departemen}} </td>
                                        <td class="text-center">{{$item->nama_manager}} </td>
                                        <td class="text-center">{{$item->jumlah_pegawai}} </td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('departemen.destroy', $item->id) }}" method="Post">
                                                <a href="{{ route('departemen.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf

                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form> 
                                        </td>
                                    </tr>

                                    @empty
                                    <div class="alert alert-danger">
                                        Data Departemen belum tersedia
                                    </div>

                                    @endforelse
                                </tbody>
                            </table>

                            <div class="row justify-content-center">
                                {{$departemen->links()}}
                            </div>
                            
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>  <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>
@endsection

@section('script')
    @if(session()->has('success'))
    <script>
        toastr.success("{{session('success')}}")
    </script>
    @endif
@endsection