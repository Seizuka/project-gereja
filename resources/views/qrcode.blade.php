<link rel="stylesheet" href="app.css">
@extends('layouts.app')

@section('content')
<style>
    h5 {
        font-family: cambria;
        font-weight: bold;
        text-align: center;
    }
    p {
        font-family: cambria;
        text-align: center;
    }
    .card-body {
        font-family: cambria;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selamat Datang !') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($users as $data)
                    <center>{{ __('Selamat !') }} {{Auth::user()->nama}}, {{ __('Silahkan Check in Ke Gereja') }}</center><br>
                    <center>{!! QrCode::size(250)->generate($data->nama); !!}</center>
                    <br><br> <center>{{ __('Semoga Tuhan Memberkati Pelayanan Kita') }} </center>
                    <br>
                    @endforeach
                    <a style="float: right;" href="#" class="btn btn-xs btn-danger" onclick="return confirm('Apakah Anda Yakin Membatalkan Jadwal Ini?');">Batal</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
