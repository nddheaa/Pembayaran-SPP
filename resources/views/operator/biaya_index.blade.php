@extends('layouts.sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header text-center" style="color: rgb(9, 54, 9)"><b>DATA BIAYA</b></h3>
                <div class="card-body">
                    <a href="{{ route( $routePrefix. '.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                    {!! Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']) !!}
                    <div class="input-group"> 
                        <input name="q" type="text" class="form-control" placeholder="Cari Data"
                        aria-label="cari data" aria-describedby="button-addon2" value="{{ request('q') }}">
                        <button type="submit" class="btn btn-outline-primary" id="button-addon2">
                            <i class="bx bx-search"></i>
                        </button>
                    </div>
                    {!! Form::close() !!}
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead class="table-success">
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Biaya</th>
                                    <th>Jumlah</th>
                                    <th>Created By</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ formatRupiah($item->jumlah) }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        {{-- <td>{{ $item->akses }}</td> --}}
                                        <td>
                                            
                                                {!! Form::open([
                                                    'route' => [ $routePrefix .'.destroy', $item->id],
                                                    'method' =>'DELETE',
                                                    'onsubmit' => 'return confirm("Apakah Yakin Ingin Menghapus Data Ini?")'
                                                ]) !!}
                                                <a href="{{ route( $routePrefix . '.edit', $item->id) }}" class = "btn btn-warning btn-sm ml-2 mr-2">
                                                <i class="fa fa-edit"></i> Edit</a>
                                                <button type="submit" class = "btn btn-danger btn-sm ml-2 mr-2">
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