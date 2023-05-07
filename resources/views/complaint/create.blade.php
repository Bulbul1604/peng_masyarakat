@extends('layout.app')
@section('title', 'Buat Laporan Pengaduan')
@section('content')
<div class="card-style mb-30">
    <form action="{{ route('complaint.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Tanggal Pengaduan</label>
                <input type="date" name="tgl_pengaduan"
                    class="form-control @error('tgl_pengaduan') is-invalid @enderror"
                    placeholder="Masukkan Tanggal Pengaduan" />
                @error('tgl_pengaduan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- End Col --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Foto Pengaduan</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                    placeholder="Masukkan Foto" />
                @error('foto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- End Col --}}
        </div>
        <div class="mb-3">
            <label class="form-label">Isi Pengaduan</label>
            <textarea name="isi_pengaduan" class="form-control @error('isi_pengaduan') is-invalid @enderror" rows="3"
                placeholder="Masukkan laporan disini"></textarea>
            @error('isi_pengaduan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        {{-- End Row --}}
        <button type="submit" class="btn px-4 text-sm btn-primary">Simpan</button>
    </form>
</div>
@endsection
