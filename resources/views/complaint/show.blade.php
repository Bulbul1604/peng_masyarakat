@extends('layout.app')
@section('title', 'Detail Data Laporan Pengaduan')
@section('content')
<div class="card-style-3 mb-30">
    <div class="card-content">
        {{-- <h6 class="mb-3">{{ ucwords($complaint->user->name) }}</h6> --}}
        <p class="text-dark mb-2">{{ ucwords($complaint->isi_pengaduan) }}</p>
        <p class="text-sm" style="font-size: 0.8rem;">{{ ucwords($complaint->user->name) }}, {{
            $complaint->tgl_pengaduan->translatedFormat('d F
            Y') }} - {{ ucwords($complaint->status) }}</p>
    </div>
</div>
@endsection
