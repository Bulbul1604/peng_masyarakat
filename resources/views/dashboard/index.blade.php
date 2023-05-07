@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
@if (auth()->user()->akses != 'masyarakat')
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="card-style-3 mb-30 rounded-4">
            <div class="card-content" style="display: flex; flex-direction: column; gap: 10px;">
                <h6 class="fw-semibold">Total Pengaduan</h6>
                <h1 class="fw-bold text-secondary">{{count($complaint)}}</h1>
                <p class="text-secondary" style="font-size: 0.8rem;">Pengaduan Masyarakat</p>
            </div>
        </div>
        <!-- end card-->
    </div>
    {{-- end col --}}
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="card-style-3 mb-30 rounded-4">
            <div class="card-content" style="display: flex; flex-direction: column; gap: 10px;">
                <h6 class="fw-semibold">Total Tanggapan</h6>
                <h1 class="fw-bold text-success">{{count($response)}}</h1>
                <p class="text-success" style="font-size: 0.8rem;">Tanggapan Masyarakat</p>
            </div>
        </div>
        <!-- end card-->
    </div>
    {{-- end col --}}
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="card-style-3 mb-30 rounded-4">
            <div class="card-content" style="display: flex; flex-direction: column; gap: 10px;">
                <h6 class="fw-semibold">Total Akun</h6>
                <h1 class="fw-bold text-danger">{{count($user)}}</h1>
                <p class="text-danger" style="font-size: 0.8rem;">Akun Masyarakat</p>
            </div>
        </div>
        <!-- end card-->
    </div>
    {{-- end col --}}
</div>
@else
<div style="width: 100%" class="d-flex align-items-center justify-content-center flex-column-reverse flex-md-column">
    <div class="">
        <h1 class="lh-base">Selamat Datang di Website Pengaduan Masyarakat</h1>
        <p>Website ini dibuat untuk melihat laporan atau keluh kesah masyarakat dan menjawabnya dengan satu platform
        </p>
    </div>
    <img src="{{ asset('assets/images/dashboard_masyarakat.png') }}" alt="">
</div>
@endif
@endsection
