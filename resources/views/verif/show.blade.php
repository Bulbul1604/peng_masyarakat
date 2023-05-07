@extends('layout.app')
@section('title', 'Detail Tanggapan Pengaduan Terverifikasi')
@section('content')
<div class="card-style-3 mb-30">
    <div class="card-content">
        <h6 class="mb-4">Pengaduan</h6>
        <img src="{{ asset('storage/pengaduan/'.$verification->pengaduan->foto) }}" alt="" width="100"
            style="object-fit: cover" class="mb-3">
        <p class="text-dark mb-2">{{ ucwords($verification->pengaduan->isi_pengaduan) }}</p>
        <p class="text-sm mb-4" style="font-size: 0.8rem;">{{ ucwords($verification->pengaduan->user->name) }}, {{
            $verification->pengaduan->tgl_pengaduan->translatedFormat('d F
            Y') }}</p>
        @if ($verification->pengaduan->status == "proses")
        <p class="text-sm fw-semibold" style="font-size: 0.8rem;">Proses tanggapan oleh {{
            ucwords($verification->user->name) }} - {{ ucwords($verification->user->keterangan) }}</p>
        @elseif ($verification->pengaduan->status == "konfirmasi")
        <p class="text-sm fw-semibold" style="font-size: 0.8rem;">Telah ditanggapi oleh {{
            ucwords($verification->user->name) }} - {{ ucwords($verification->user->keterangan) }} dan menunggu
            konfirmasi Pimpinan</p>
        @endif
    </div>
</div>
@endsection
