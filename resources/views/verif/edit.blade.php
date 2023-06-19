@extends('layout.app')
@section('title', 'Detail Tanggapan Pengaduan Terverifikasi')
@section('content')
    <div class="card-style-3 mb-30">
        <div class="card-content">
            <h6 class="mb-4">Pengaduan</h6>
            <img src="{{ asset('storage/pengaduan/' . $verification->pengaduan->foto) }}" alt="" width="100"
                style="object-fit: cover" class="mb-3">
            <p class="mb-2 text-dark">{{ ucwords($verification->pengaduan->isi_pengaduan) }}</p>
            <p class="mb-4 text-sm" style="font-size: 0.8rem;">{{ ucwords($verification->pengaduan->user->name) }},
                {{ $verification->pengaduan->tgl_pengaduan->translatedFormat('d F Y') }}</p>
            @if ($verification->pengaduan->status == 'proses')
                <p class="text-sm fw-semibold" style="font-size: 0.8rem;">Proses tanggapan oleh
                    {{ ucwords($verification->user->name) }} - {{ ucwords($verification->user->keterangan) }}</p>
            @elseif ($verification->pengaduan->status == 'konfirmasi')
                <p class="text-sm fw-semibold" style="font-size: 0.8rem;">Menunggu konfirmasi Pimpinan</p>
            @endif
        </div>
        <hr />
        <form action="{{ route('verif.update', $verification->id) }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="pengaduan_id" value="{{ $verification->pengaduan->id }}">
            @if (auth()->user()->akses == 'petugas')
                <div class="mb-3">
                    <label class="form-label">Tanggapan Petugas</label>
                    <textarea name="isi_tanggapan" rows="4" class="form-control @error('isi_tanggapan') is-invalid @enderror"></textarea>
                    @error('isi_tanggapan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="mt-3 text-sm btn btn-primary">Simpan</button>
            @endif

            @if (auth()->user()->akses == 'pimpinan')
                {{-- <div class="mb-3">
                    <label class="form-label">Tanggapan Petugas</label>
                    <textarea name="isi_tanggapan" rows="4" class="form-control @error('isi_tanggapan') is-invalid @enderror">{{ $verification->isi_tanggapan }}</textarea>
                    @error('isi_tanggapan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <button type="submit" class="mt-3 text-sm btn btn-success">Konfirmasi</button>
            @endif

        </form>
    </div>
@endsection
