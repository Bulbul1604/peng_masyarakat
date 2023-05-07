@extends('layout.app')
@section('title', 'Data Users Login')
@section('content')
<div class="card-style mb-30">
    @if(Session::has('success'))
    <div class="alert alert-success text-sm">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="text-end">
        <a href="{{ route('users.create') }}" class="btn text-sm btn-primary mb-4">Tambah Data</a>
    </div>
    <div class="table-wrapper table-responsive">
        <table id="example" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Akses</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td class="text-sm pb-3">{{ ucwords($user->name) }}</td>
                    <td class="text-sm pb-3">{{ ucwords($user->email) }}</td>
                    <td class="text-sm pb-3">{{ ucwords($user->akses) }}</td>
                    <td class="text-sm pb-3">{{ ucwords($user->keterangan) }}</td>
                    <td class="d-flex gap-2 pb-3">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn text-sm btn-outline-warning">Ubah</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Hapus data ?');"
                                class="btn text-sm btn-outline-danger">Delete</button>
                        </form>
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
        $('#example').DataTable();
    });
</script>
@endsection
