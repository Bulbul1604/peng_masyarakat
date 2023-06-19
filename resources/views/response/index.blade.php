@extends('layout.app')
@section('title', 'Data Laporan Pengaduan')
@section('content')
<div class="card-style mb-30">
    @if(Session::has('success'))
    <div class="text-sm alert alert-success">
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
                    <td class="pb-3 text-sm">{{ ucwords($response->pengaduan->user->name) }}</td>
                    <td class="pb-3 text-sm">{{ $response->pengaduan->tgl_pengaduan->translatedFormat('d F Y'); }}</td>
                    <td class="pb-3 text-sm">{{ $response->tgl_tanggapan->translatedFormat('d F Y'); }}</td>
                    <td class="pb-3 text-sm">
                        <a href="{{ asset('storage/pengaduan/'.$response->pengaduan->foto) }}" target="_blank"
                            rel="noopener noreferrer">
                            <img src="{{ asset('storage/pengaduan/'.$response->pengaduan->foto) }}" alt="" width="30" />
                        </a>
                    </td>
                    <td class="pb-3 text-sm"><span class="badge text-bg-success">{{
                            ucwords($response->pengaduan->status) }}</span></td>
                    <td class="gap-2 pb-3 d-flex">
                        <a href="{{ route('response.show', $response->id) }}"
                            class="text-sm btn btn-outline-info">Info</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-sm text-center fw-bold text-mutted">Data tidak tersedia</td>
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
