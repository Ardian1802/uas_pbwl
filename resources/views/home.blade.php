@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="mb-4">{{ __('Halo,') }} <strong>{{ Auth::user()->name }}</strong>! {{ __('Selamat datang di Sistem Informasi Kegiatan Desa!') }}</p>
                    
                    <div class="alert alert-info" role="alert">
                        {{ __('Sistem ini adalah wujud dari komitmen kami untuk meningkatkan keterbukaan dan keterlibatan seluruh warga dalam setiap kegiatan desa. Dengan kehadiran Anda di sini, kami berharap dapat membangun keterhubungan yang lebih baik dan menjadikan desa ini tempat yang lebih baik untuk kita semua.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
