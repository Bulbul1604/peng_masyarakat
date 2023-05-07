@extends('layout.app')
@section('title', 'Detail Tanggapan Pengaduan')
@section('content')
<div class="card-style-3 mb-30">
    <div class="card-content">
        <h6 class="mb-2">Pengaduan</h6>
        <p class="text-dark mb-2">{{ ucwords($response->pengaduan->isi_pengaduan) }}</p>
        <p class="text-sm" style="font-size: 0.8rem;">{{ ucwords($response->pengaduan->user->name) }}, {{
            $response->pengaduan->tgl_pengaduan->translatedFormat('d F
            Y') }}</p>
    </div>
    <hr>
    <div class="card-content">
        <h6 class="mb-2">Tanggapan</h6>
        <p class="text-dark mb-2">{{ ucwords($response->isi_tanggapan) }}</p>
        <p class="text-sm" style="font-size: 0.8rem;">{{ ucwords($response->user->keterangan) }}, {{
            $response->tgl_tanggapan->translatedFormat('d F
            Y') }}</p>
    </div>
</div>
@endsection
