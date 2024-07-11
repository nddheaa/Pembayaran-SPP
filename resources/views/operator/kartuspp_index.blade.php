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
                        <h2 class="text-uppercase">KARTU SPP</h2>
                        <div class="billed"><span class="font-weigpht-bold ">
                            Sekolah : </span><span class="ml-1">Neo Culture Technology High School</span>
                        </div>
                        <div class="billed"><span class="font-weight-bold ">
                            Nama Siswa : </span><span class="ml-1">{{$detailsiswa->nama }}</span>
                        </div>
                        <div class="billed"><span class="font-weight-bold ">
                            Kelas : </span><span class="ml-1">{{$detailsiswa->jurusan }} {{$detailsiswa->kelas }}</span>
                        </div>
                        <div class="billed"><span class="font-weight-bold ">
                            Angkatan: </span><span class="ml-1">{{$detailsiswa->angkatan }}</span>
                        </div>
                </div>
                <div class="col-md-3 text-right mt-3" style="text-align: center;">
                    <img src="{{ asset('sneat') }}/assets/img/avatars/nctlogo.png" alt class="mx-auto d-block w-px-100 h-auto rounded-circle" />
                    <span>To The World, We Are NCT</span></div>
            </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table table-pastel-gray table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan Tagihan</th>
                                    <th>Item Tagihan</th>
                                    <th>Total</th>
                                    <th>Paraf</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tagihan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('F Y', strtotime($item->tanggal_tagihan)) }}</td>
                                        <td>
                                        <ul>
                                            @foreach ($item->tagihanDetails as $itemDetails)
                                                <li>{{ $itemDetails->nama_biaya }}
                                                ({{ $itemDetails->jumlah_biaya}})</li>
                                            @endforeach
                                        </ul>
                                        </td>
                                        <td>{{ formatRupiah($item->tagihanDetails->sum('jumlah_biaya')) }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection