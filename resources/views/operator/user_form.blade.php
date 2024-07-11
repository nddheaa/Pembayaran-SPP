@extends('layouts.sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                    <div class="form-group">
                        <label for="name">Nama</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Hp</label>
                        {!! Form::text('no_hp', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                    </div>
                    @if (\Route::is('user.create'))
                    <div class="form-group">
                        <label for="akses">Hak akses</label>
                        {!! Form::select('akses',[
                            'operator' => 'Operator Sekolah',
                            'admin' =>'Administrator',
                            'siswa' =>'Siswa',
                    ],
                    null,
                    ['class' => 'form-control'],
                    ) !!}
                        <span class="text-danger">{{ $errors->first('akses') }}</span>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="password">Password</label>
                        {!! Form::text('password', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                    <br>
                    {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
