@extends('layout.app')
@section('title', 'Data Laporan Pengaduan')
@section('content')
    <div class="card-style mb-30">
        @if (Session::has('success'))
            <div class="text-sm alert alert-success">
                {{ Session::get('success') }}
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
                            <td class="pb-3 text-sm">{{ ucwords($complaint->user->name) }}</td>
                            <td class="pb-3 text-sm">{{ $complaint->tgl_pengaduan->translatedFormat('d F Y') }}</td>
                            <td class="pb-3 text-sm">
                                <a href="{{ asset('storage/pengaduan/' . $complaint->foto) }}" target="_blank"
                                    rel="noopener noreferrer">
                                    <img src="{{ asset('storage/pengaduan/' . $complaint->foto) }}" alt=""
                                        width="30" />
                                </a>
                            </td>
                            <td class="pb-3 text-sm">
                                @if ($complaint->status == 'verifikasi')
                                    <span class="badge text-bg-primary">{{ ucwords($complaint->status) }}
                                    @else
                                        <span class="text-white badge text-bg-warning">{{ ucwords($complaint->status) }}
                                @endif
                                </span>
                            </td>
                            <td class="gap-2 pb-3 d-flex">
                                <a href="{{ route('complaint.show', $complaint->id) }}"
                                    class="text-sm btn btn-outline-info">Info</a>
                                @if (auth()->user()->akses == 'masyarakat')
                                    @if ($complaint->status == 'verifikasi')
                                        <form action="{{ route('complaint.destroy', $complaint->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Hapus data ?');"
                                                class="text-sm btn btn-outline-danger">Delete</button>
                                        </form>
                                    @endif
                                @elseif (auth()->user()->akses == 'admin')
                                    <a href="{{ route('complaint.edit', $complaint->id) }}"
                                        class="text-sm btn btn-outline-success">Verif</a>
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
            $('#pengaduan').DataTable();
        });
    </script>
@endsection
