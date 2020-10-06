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
                    @csrf
                        @if ($message = Session::get('warning'))
                            <div class="alert alert-warning alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                    <center>{{ __('Halo !') }} {{Auth::user()->nama}}, {{ __('Silahkan Pilih Jadwal Ibadah') }}</center><br>
                    <form method="POST" action="{{ route('daftarpagi') }}" enctype="multipart/form-data">
                        <input id="id_user" type="hidden" class="form-control" name="id_user" value="{{Auth::user()->id}}">
                        @foreach ($sisa as $kuota)
                        <div class="card">
                            <h5 class="card-header">Ibadah Pagi</h5>
                            <div class="card-body">
                                <p class="card-text">{{strftime("%a %d %b %Y", strtotime(date('l, d F Y')))}}</p>
                                <p class="card-text">Pukul 09.00-10.00</p>
                                <p class="card-text">Sisa Kuota : {{ $kuota -> kuota}}</p>
                                <center><button id="kuota" class="btn btn-primary" type="submit" value="">
                                {{ __('Daftar') }}
                                {{ csrf_field() }}
                                </button></center>
                            </div>
                        </div> 
                        @endforeach
                    </form>
                    <br><br>
                     <form method="POST" action="{{ route('daftarmalam') }}" enctype="multipart/form-data">
                        <input id="id_user" type="hidden" class="form-control" name="id_user" value="{{Auth::user()->id}}">
                        @foreach ($sisa2 as $kuota2)
                        <div class="card">
                            <h5 class="card-header">Ibadah Malam</h5>
                            <div class="card-body">
                                <p class="card-text">{{strftime("%a %d %b %Y", strtotime(date('l, d F Y')))}}</p>
                                <p class="card-text">Pukul 18.00-20.00</p>
                                <p class="card-text">Sisa Kuota : {{ $kuota2 -> kuota}}</p>
                                <center><button id="kuota" class="btn btn-primary" type="submit" value="">
                                {{ __('Daftar') }}
                                {{ csrf_field() }}
                                </button></center>
                            </div>
                        </div>
                        @endforeach
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection