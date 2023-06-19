@extends('layout.app')
@section('title', 'Laporan Pengaduan Telah Diverifikasi')
@section('content')
    <div class="card-style mb-30">
        @if (Session::has('success'))
            <div class="text-sm alert alert-success">
                {{ Session::get('success') }}
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
                            <td class="pb-3 text-sm">{{ ucwords($verification->pengaduan->user->name) }}</td>
                            <td class="pb-3 text-sm">
                                {{ $verification->pengaduan->tgl_pengaduan->translatedFormat('d F Y') }}
                            </td>
                            <td class="pb-3 text-sm">
                                <a href="{{ asset('storage/pengaduan/' . $verification->pengaduan->foto) }}" target="_blank"
                                    rel="noopener noreferrer">
                                    <img src="{{ asset('storage/pengaduan/' . $verification->pengaduan->foto) }}"
                                        alt="" width="30" />
                                </a>
                            </td>
                            <td class="pb-3 text-sm">
                                @if ($verification->pengaduan->status == 'konfirmasi')
                                    <span
                                        class="text-white badge text-bg-success">{{ ucwords($verification->pengaduan->status) }}</span>
                                @else
                                    <span
                                        class="text-white badge text-bg-warning">{{ ucwords($verification->pengaduan->status) }}</span>
                                @endif
                            </td>
                            <td class="gap-2 pb-3 d-flex">
                                <a href="{{ route('verif.show', $verification->id) }}"
                                    class="text-sm btn btn-outline-info">Info</a>
                                @if (auth()->user()->akses == 'petugas')
                                    <a href="{{ route('verif.edit', $verification->id) }}"
                                        class="text-sm btn btn-outline-success">Tanggapi</a>
                                @endif
                                @if (auth()->user()->akses == 'pimpinan')
                                    <a href="{{ route('verif.edit', $verification->id) }}"
                                        class="text-sm btn btn-outline-success">Konfirmasi</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-sm text-center fw-bold text-mutted">Data tidak tersedia</td>
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
        $(document).ready(function() {
            $('#verif').DataTable();
        });
    </script>
@endsection
