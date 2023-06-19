@extends('layout.app')
@section('title', 'Detail Data Laporan Pengaduan')
@section('content')
    <div class="card-style-3 mb-30">
        <div class="card-content">
            {{-- <h6 class="mb-3">{{ ucwords($complaint->user->name) }}</h6> --}}
            <p class="mb-3 text-dark">{{ ucwords($complaint->isi_pengaduan) }}</p>
            <p class="pb-0 mb-0 text-sm" style="font-size: 0.8rem;">{{ ucwords($complaint->user->name) }},
                {{ $complaint->tgl_pengaduan->translatedFormat('d F Y') }} -
                {{ $complaint->created_at->translatedFormat('H:i') }}
            </p>
            <small style="font-size: 0.7rem; color: #818591">Status :
                {{ ucwords($complaint->status) }}</small>
            -
            <small style="font-size: 0.7rem; color: #818591">Alamat pengadu :
                {{ ucwords($complaint->alamat_pengadu) }}</small>
        </div>
    </div>
@endsection
