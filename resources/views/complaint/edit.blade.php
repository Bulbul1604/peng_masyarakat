@extends('layout.app')
@section('title', 'Verifikasi Laporan Pengaduan Masyarakat')
@section('content')
<div class="card-style-3 mb-30">
    <div class="card-content">
        <p class="text-dark mb-2">{{ ucwords($complaint->isi_pengaduan) }}</p>
        <p class="text-sm" style="font-size: 0.8rem;">{{ ucwords($complaint->user->name) }}, {{
            $complaint->tgl_pengaduan->translatedFormat('d F
            Y') }} - {{ ucwords($complaint->status) }}</p>
    </div>
    <hr />
    <form action="{{ route('complaint.update', $complaint->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label class="form-label">PIlih Petugas</label>
            <br />
            <span class="text-sm text-mutted mb-2">* Silahkan pilih petugas untuk memberikan tanggapan.</span>
            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                <option>Pilih Petugas</option>
                @foreach ($officers as $officer)
                <option value="{{$officer->id}}">{{ ucwords($officer->name) }} - {{ ucwords($officer->keterangan) }}
                </option>
                @endforeach
            </select>
            @error('user_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div>
            <button type="submit" class="text-sm btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
