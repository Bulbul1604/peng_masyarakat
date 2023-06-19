@extends('layout.app')
@section('title', 'Detail Tanggapan Pengaduan')
@section('content')
    <div class="card-style-3 mb-30">
        <div class="card-content">
            <h6 class="mb-2">Pengaduan</h6>
            <p class="mb-2 text-dark">{{ ucwords($response->pengaduan->isi_pengaduan) }}</p>
            <p class="text-sm" style="font-size: 0.8rem;">{{ ucwords($response->pengaduan->user->name) }},
                {{ $response->pengaduan->tgl_pengaduan->translatedFormat('d F Y') }} -
                {{ $response->pengaduan->created_at->translatedFormat('H:i') }}
            </p>
            <small style="font-size: 0.7rem; color: #818591">Alamat pengadu :
                {{ ucwords($response->pengaduan->alamat_pengadu) }}</small>
        </div>
        <hr>
        <div class="card-content">
            <h6 class="mb-2">Tanggapan</h6>
            <p class="mb-2 text-dark">{{ ucwords($response->isi_tanggapan) }}</p>
            <p class="text-sm" style="font-size: 0.8rem;">{{ ucwords($response->user->keterangan) }},
                {{ $response->tgl_tanggapan->translatedFormat('d F Y - H:i') }}
            </p>
        </div>
    </div>
@endsection
