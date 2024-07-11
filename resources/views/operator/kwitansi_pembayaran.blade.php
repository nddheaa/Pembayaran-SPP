@extends('layouts.sneat_blank')

@section('content')

<script type="text/javascript">
    <!--
    window.print();
    //-->
    </script>   
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="p-3 bg-white rounded">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="text-uppercase">KWITANSI PEMBAYARAN</h2>
                        <div class="billed"><span class="font-weight-bold ">
                            Sekolah : </span><span class="ml-1">Neo Culture Technology High School</span></div>
                        <div class="billed"><span class="font-weight-bold">
                            Tanggal Tagihan : </span><span class="ml-1">{{ $pembayaran->tanggal_bayar }}</span></div>
                        <div class="billed"><span class="font-weight-bold">ID Pembayaran : </span><span class="ml-1">#NCT-{{ $pembayaran->id }}</span></div>
                    </div>
                    <div class="col-md-3 text-right mt-3" style="text-align: center;">
                        <img src="{{ asset('sneat') }}/assets/img/avatars/nctlogo.png" alt class="mx-auto d-block w-px-100 h-auto rounded-circle" />
                        <span>To The World, We Are NCT</span></div>
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table" style="background-color: #e5ffb9; border-color: #004d00;">
                            <thead>
                                <tr>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Metode Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($pembayaran->tanggal_bayar)) }}</td>
                                    <td>{{ formatRupiah($pembayaran->jumlah_dibayar) }}</td>
                                    <td>{{ $pembayaran->metode_pembayaran }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-right mb-3">
                    Terbilang : <i>{{ ucwords(formatTerbilang($pembayaran->jumlah_dibayar)) }}</i>
                </div>
                <div>
                    Kwangya, <td>{{ date('d-m-Y', strtotime($pembayaran->tanggal_bayar)) }}</td>
                    <br>
                    <img src="{{ asset('sneat') }}/assets/img/avatars/nctp.png" alt class="d-block w-px-50 h-auto pb-2 pt-2 " />
                    <u>{{ $pembayaran->user->name  }}</u>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection