@extends('layout.app')
@section('title', 'Tambah Data Users Login')
@section('content')
<div class="card-style mb-30">
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Masukkan Nama Lengkap" />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- End Col --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Masukkan Email" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- End Col --}}
        </div>
        {{-- End Row --}}
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Akses</label>
                <select name="akses" class="form-select @error('akses') is-invalid @enderror">
                    <option>Pilih salah satu...</option>
                    @foreach ($roles as $role)
                    <option value="{{$role}}">{{ucwords($role)}}</option>
                    @endforeach
                </select>
                @error('akses')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- End Col --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                    placeholder="Keterangan User" />
                @error('keterangan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- End Col --}}
        </div>
        {{-- End Row --}}
        <button type="submit" class="btn px-4 text-sm btn-primary">Simpan</button>
    </form>
</div>
@endsection
