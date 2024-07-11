@extends('layouts.sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-white" style="background-color: rgba(145, 202, 117, 0.901)" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    CATATAN:
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body mx-2 mt-2" style="text-align: justify;">
                        Harap pastikan untuk memverifikasi semua informasi pembayaran siswa sebelum menyelesaikan transaksi. Kesalahan atau ketidaksesuaian 
                        data dapat memengaruhi proses administrasi akademis. Kami menghargai kerja sama dan perhatian Anda 
                        dalam memastikan keakuratan setiap detail pembayaran.
                    </div>
                </div>
                </div>
            <div class="card mt-2">
                <h3 class="card-header text-center" style="color: rgb(9, 56, 9)"><b>DATA TAGIHAN</b></h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route( $routePrefix. '.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                    <div class="col-md-6">
                    {!! Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']) !!}
                        <div class="row">
                        <div class="col-md-6 col-sm-12">
                            {!! Form::selectMonth('bulan', request('bulan'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-3 col-sm-12">
                            {!! Form::selectRange('tahun', 2022, date('Y') + 1, request('tahun'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-3 ">
                            <button class="btn btn-primary" type="submit">Tampil</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
<br>

            
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>NO</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Tanggal Tagihan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Status</th>
                                    <th>Total Tagihan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->detailsiswa->nisn }}</td>
                                        <td>{{ $item->detailsiswa->nama }}</td>
                                        <td>{{ $item->tanggal_tagihan}}</td>
                                        <td>{{ $item->tanggal_jatuh_tempo }}</td>
                                        <td>
                                            @if($item->status == 'baru')
                                                <button class="btn btn-secondary btn-sm">{{$item->status}}</button>
                                            @elseif($item->status == 'angsur')
                                                <button class="btn btn-warning btn-sm">{{$item->status}}</button>
                                            @elseif($item->status == 'lunas')
                                                <button class="btn btn-success btn-sm">{{$item->status}}</button>
                                            @else
                                                <button>{{$item->status}}</button>
                                            @endif
                                        </td>
                                        <td>{{ 'Rp ' . number_format($item->tagihanDetails->sum('jumlah_biaya'), 0, ',', '.') }}</td>
                                        
                                        <td>
                                            {{ $item->akses }}
                                            {!! Form::open([
                                                'route' => [ $routePrefix .'.destroy', $item->id],
                                                'method' =>'DELETE',
                                                'onsubmit' => 'return confirm("Apakah Yakin Ingin Menghapus Data Ini?")'
                                            ]) !!}
                                                <a href="{{ route( $routePrefix . '.show',[ 
                                                    $item->id,
                                                    'siswa_id'=>$item->siswa_id,
                                                    // 'bulan'=> $item->tanggal_tagihan->format('m'),
                                                    // 'tahun'=> $item->tanggal_tagihan->format('Y'),
                                                ]) }}" 
                                                class = "btn btn-info btn-sm">
                                                <i class="fa fa-edit "></i> Detail</a>
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