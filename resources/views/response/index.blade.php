@extends('layout.app')
@section('title', 'Data Laporan Pengaduan')
@section('content')
<div class="card-style mb-30">
    @if(Session::has('success'))
    <div class="alert alert-success text-sm">
        {{Session::get('success')}}
    </div>
    @endif

    <div class="table-wrapper table-responsive">
        <table id="pengaduan" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tgl Pengaduan</th>
                    <th>Tgl Tanggapan</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($responses as $response)
                <tr>
                    <td class="text-sm pb-3">{{ ucwords($response->pengaduan->user->name) }}</td>
                    <td class="text-sm pb-3">{{ $response->pengaduan->tgl_pengaduan->translatedFormat('d F Y'); }}</td>
                    <td class="text-sm pb-3">{{ $response->tgl_tanggapan->translatedFormat('d F Y'); }}</td>
                    <td class="text-sm pb-3">
                        <a href="{{ asset('storage/pengaduan/'.$response->pengaduan->foto) }}" target="_blank"
                            rel="noopener noreferrer">
                            <img src="{{ asset('storage/pengaduan/'.$response->pengaduan->foto) }}" alt="" width="30" />
                        </a>
                    </td>
                    <td class="text-sm pb-3"><span class="badge text-bg-success">{{
                            ucwords($response->pengaduan->status) }}</span></td>
                    <td class="d-flex gap-2 pb-3">
                        <a href="{{ route('response.show', $response->id) }}"
                            class="btn text-sm btn-outline-info">Info</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-sm fw-bold text-mutted">Data tidak tersedia</td>
                    <td></td>
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
        $('#pengaduan').DataTable();
    });
</script>
@endsection
