@extends('layouts.sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <a href="{{ route( $routePrefix. '.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->akses }}</td>
                                        <td>
                                                {!! Form::open([
                                                    'route' => [ $routePrefix .'.destroy', $item->id],
                                                    'method' =>'DELETE',
                                                    'onsubmit' => 'return confirm("Apakah Yakin Ingin Menghapus Data Ini?")'
                                                ]) !!}
                                                <a href="{{ route( $routePrefix . '.edit', $item->id) }}" class = "btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit</a>
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
