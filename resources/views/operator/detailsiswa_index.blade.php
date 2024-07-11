@extends('layouts.sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header text-center" style="color: rgb(9, 54, 9)"><b>DATA SISWA</b></h3>
                <div class="card-body">
                    <a href="{{ route( $routePrefix. '.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                    {!! Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']) !!}
                    <div class="input-group"> 
                        <input name="q" type="text" class="form-control" placeholder="Cari Nama Siswa"
                        aria-label="cari nama" aria-describedby="button-addon2" value="{{ request('q') }}">
                        <button type="submit" class="btn btn-outline-primary" id="button-addon2">
                            <i class="bx bx-search"></i>
                        </button>
                    </div>
                    {!! Form::close() !!}
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th>NO</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->siswa->name }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->angkatan }}</td>
                                        {{-- <td>{{ $item->akses }}</td> --}}
                                        <td>
                                            
                                                {!! Form::open([
                                                    'route' => [ $routePrefix .'.destroy', $item->id],
                                                    'method' =>'DELETE',
                                                    'onsubmit' => 'return confirm("Apakah Yakin Ingin Menghapus Data Ini?")'
                                                ]) !!}
                                                <a href="{{ route( $routePrefix . '.edit', $item->id) }}" class = "btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit</a>
                                                <a href="{{ route( $routePrefix . '.show', $item->id) }}" class = "btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i> Detail</a>
                                                <button type="submit" class = "btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>Hapus 
                                                </button>
                                                {!! Form::close() !!}
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Data Tidak Ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $models->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection