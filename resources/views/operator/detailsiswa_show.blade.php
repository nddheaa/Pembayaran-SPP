@extends('layouts.sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="table-responsive">
                                <img src="{{ \Storage::url($model->foto) }}" width="150"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="text-align: justify;">
                                <h6>CATATAN: </h6>
                                <p>
                                    Harap pastikan bahwa setiap rincian pada data siswa ini telah diperiksa dengan teliti. Kehati-hatian Anda dalam memastikan keakuratan informasi sangat diperlukan. Jika terdapat ketidaksesuaian atau perlu perbaikan, segera tindaklanjuti untuk memastikan kelancaran proses administratif. Terima kasih atas Perhatian Anda.
                                </p>
                                

                                
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <br>
                                        <tr>
                                            <td width="15%">Status</td>
                                            <td id="status-cell">:
                                                <button class="btn btn-success btn-sm">{{ $model->siswa_status }}</button>
                                            </td>
                                        </tr>                                                                              
                                        <tr>
                                            <td width="15%">ID</td>
                                            <td>: {{ $model->id }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Nama</td>
                                            <td>: {{ $model->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">NISN</td>
                                            <td>: {{ $model->nisn }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Jurusan</td>
                                            <td>: {{ $model->jurusan }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Kelas</td>
                                            <td>: {{ $model->kelas }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Angkatan</td>
                                            <td>: {{ $model->angkatan }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Tanggal Buat</td>
                                            <td>: {{ $model->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Tanggal Ubah</td>
                                            <td>: {{ $model->updated_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Dibuat Oleh</td>
                                            <td>: {{ $model->user->name }}</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
