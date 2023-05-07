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
                    <th>Tanggal</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($complaints as $complaint)
                <tr>
                    <td class="text-sm pb-3">{{ ucwords($complaint->user->name) }}</td>
                    <td class="text-sm pb-3">{{ $complaint->tgl_pengaduan->translatedFormat('d F Y'); }}</td>
                    <td class="text-sm pb-3">
                        <a href="{{ asset('storage/pengaduan/'.$complaint->foto) }}" target="_blank"
                            rel="noopener noreferrer">
                            <img src="{{ asset('storage/pengaduan/'.$complaint->foto) }}" alt="" width="30" />
                        </a>
                    </td>
                    <td class="text-sm pb-3">
                        @if ($complaint->status == 'verifikasi')
                        <span class="badge text-bg-primary">{{ ucwords($complaint->status) }}
                            @else
                            <span class="badge text-bg-warning text-white">{{ ucwords($complaint->status) }}
                                @endif
                            </span>
                    </td>
                    <td class="d-flex gap-2 pb-3">
                        <a href="{{ route('complaint.show', $complaint->id) }}"
                            class="btn text-sm btn-outline-info">Info</a>
                        @if (auth()->user()->akses == 'masyarakat')
                        @if ($complaint->status == 'verifikasi')
                        <form action="{{ route('complaint.destroy', $complaint->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Hapus data ?');"
                                class="btn text-sm btn-outline-danger">Delete</button>
                        </form>
                        @endif
                        @elseif (auth()->user()->akses == 'admin')
                        <a href="{{ route('complaint.edit', $complaint->id) }}"
                            class="btn text-sm btn-outline-success">Verif</a>
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
        $('#pengaduan').DataTable();
    });
</script>
@endsection
