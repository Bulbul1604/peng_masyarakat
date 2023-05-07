@extends('layout.app')
@section('title', 'Laporan Pengaduan Telah Diverifikasi')
@section('content')
<div class="card-style mb-30">
    @if(Session::has('success'))
    <div class="alert alert-success text-sm">
        {{Session::get('success')}}
    </div>
    @endif

    <div class="table-wrapper table-responsive">
        <table id="verif" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($verifications as $verification)
                <tr>
                    <td class="text-sm pb-3">{{ ucwords($verification->pengaduan->user->name) }}</td>
                    <td class="text-sm pb-3">{{ $verification->pengaduan->tgl_pengaduan->translatedFormat('d F Y'); }}
                    </td>
                    <td class="text-sm pb-3">
                        <a href="{{ asset('storage/pengaduan/'.$verification->pengaduan->foto) }}" target="_blank"
                            rel="noopener noreferrer">
                            <img src="{{ asset('storage/pengaduan/'.$verification->pengaduan->foto) }}" alt=""
                                width="30" />
                        </a>
                    </td>
                    <td class="text-sm pb-3">
                        @if ($verification->pengaduan->status == "konfirmasi")
                        <span class="badge text-bg-success text-white">{{
                            ucwords($verification->pengaduan->status)}}</span>
                        @else
                        <span class="badge text-bg-warning text-white">{{
                            ucwords($verification->pengaduan->status)}}</span>
                        @endif
                    </td>
                    <td class="d-flex gap-2 pb-3">
                        <a href="{{ route('verif.show', $verification->id) }}"
                            class="btn text-sm btn-outline-info">Info</a>
                        @if (auth()->user()->akses == 'petugas')
                        <a href="{{ route('verif.edit', $verification->id) }}"
                            class="btn text-sm btn-outline-success">Tanggapi</a>
                        @endif
                        @if (auth()->user()->akses == 'pimpinan')
                        <a href="{{ route('verif.edit', $verification->id) }}"
                            class="btn text-sm btn-outline-success">Konfirmasi</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-sm fw-bold text-mutted">Data tidak tersedia</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <!-- end table -->
    </div>
</div>
@endsection
@section('after_script')
<script>
    $(document).ready(function () {
        $('#verif').DataTable();
    });
</script>
@endsection
