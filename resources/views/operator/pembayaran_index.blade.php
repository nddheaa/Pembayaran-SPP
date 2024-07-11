@extends('layouts.sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header text-center" style="color: rgb(9, 54, 9)"><b>DATA PEMBAYARAN</b></h3>
                    <br>
                    {!! Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']) !!}
                    <div class="row">
                        <div class="col-md-11 mx-3">
                            <div class="input-group">
                                <input name="q" type="text" class="form-control" placeholder="Cari Data" aria-label="cari data" value="{{ request('q') }}">
                                <button type="submit" class="btn btn-outline-primary" id="button-addon2">
                                    <i class="bx bx-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}                                                        
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm mx-3 mr-3 mb-3">
                            <thead class="table-success">
                                <tr>
                                    <th>NO</th>
                                    <th>ID Tagihan</th>
                                    <th>ID Siswa</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah</th>
                                    <th>Konfirmasi</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tagihan_id}}</td>
                                        <td>{{ $item->siswa_id}}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tanggal_bayar)) }}</td>
                                        <td>{{ formatRupiah($item->jumlah_dibayar) }}</td>
                                        <td><button class="btn btn-success btn-sm">{{$item->status_konfirmasi}}</button></td>
                                        <td>{{ $item->user->name }}</td>
                                        {{-- <td>{{ $item->akses }}</td> --}}
                                        <td>
                                            
                                                {!! Form::open([
                                                    'route' => [ $routePrefix .'.destroy', $item->id],
                                                    'method' =>'DELETE',
                                                    'onsubmit' => 'return confirm("Apakah Yakin Ingin Menghapus Data Ini?")'
                                                ]) !!}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection