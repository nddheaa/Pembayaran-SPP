@extends('layouts.sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">DATA TAGIHAN SPP SISWA {{ strtoupper($periode) }}</h5>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td rowspan="8" width="150">
                                <img src="{{ \Storage::url($detailsiswa->foto) }}" alt="{{ $detailsiswa->nama }}" width="150">
                            </td>
                        </tr>
                        <tr>
                            <td width="120">NISN</td>
                            <td>: {{ $detailsiswa->nisn }}</td>
                        </tr>
                        <tr>
                            <td width="120">Nama</td>
                            <td>: {{ $detailsiswa->nama }}</td>
                        </tr>
                    </table>
                    <style>
                        .small-btn {
    font-size: 12px; /* You can adjust the font size as needed */
    padding: 10px 10px; 
    margin: 1%;/* You can adjust the padding as needed */
                        }
                    </style>
                    <a href="{{ route('kartuspp.index', [
                        'siswa_id' => $detailsiswa->id,
                        'tahun' => request('year'),
                    ]) }}" class="btn btn-success small-btn" target="blank"><i class="fa fa-file mx-3"> &nbsp Kartu SPP </i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-5">
            <div class="card">
                <h5 class="card-header pb-0"> DATA TAGIHAN {{ strtoupper($periode) }}</h5>
                <div class="card-body">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tagihan</th>
                                <th>Jumlah Tagihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tagihan->tagihanDetails as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_biaya }}</td>
                                    <td>{{ formatRupiah($item->jumlah_biaya) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Total Pembayaran</td>
                                <td> {{ formatRupiah($tagihan->tagihanDetails->sum('jumlah_biaya')) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <h5 class="card-header pb-1 px-0">SISA PEMBAYARAN: {{ formatRupiah($tagihan->tagihanDetails->sum('jumlah_biaya') - $tagihan->pembayaran->sum('jumlah_dibayar')) }}</h5>
                </div>
            </div>
        </div>
        
        <div class="col-md-7">
            <div class="card">
                <h5 class="card-header pb-0"> DATA PEMBAYARAN</h5>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>TANGGAL</th>
                                <th>JUMLAH</th>
                                <th>METODE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tagihan->pembayaran as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('kwitansipembayaran.show', $item->id) }}" target="blank"><i class="fa fa-print" style="color: rgb(161, 255, 47)"></i></a>
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($item->tanggal_bayar)) }}</td>
                                    <td>{{ formatRupiah($item->jumlah_dibayar) }}</td>
                                    <td>{{ $item->metode_pembayaran }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h5 class="pb-1">STATUS PEMBAYARAN : {{ strtoupper($tagihan->status) }}</h5>
                    
                </div>

            </div>
        </div>
        <div class="class col-md-12 mt-3">
            <div class="card">
                <h5 class="card-header">FORM PEMBAYARAN</h5>
                <div class="card-body">
                    {!! Form::model($model, ['route' => 'pembayaran.store', 'method' => 'POST']) !!}
                    {!! Form::hidden('tagihan_id', $tagihan->id, []) !!}
                    <div class="form-group">
                        <label for="tanggal_bayar">Tanggal Pembayaran</label>
                        {!! Form::date('tanggal_bayar', $model->tanggal_bayar ?? \Carbon\Carbon::now()
                        , ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('tanggal_bayar') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="jumlah_dibayar">Jumlah Yang Dibayarkan</label>
                        {!! Form::text('jumlah_dibayar', null, ['class' => 'form-control rupiah']) !!}
                        <span class="text-danger">{{ $errors->first('jumlah_dibayar') }}</span>
                    </div>
                    {!! Form::submit('SIMPAN', ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection