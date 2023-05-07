@extends('layout.app')
@section('title', 'Print Data Laporan')
@section('content')
<div class="card-style mb-30">
    <div class="d-flex justify-content-end">
        <form action="{{ route('generate-report-print') }}" method="post"
            class="d-inline-flex gap-3 align-items-center">
            @csrf
            <select name="status" id="status" class="px-3 border rounded py-2 bg-white" required>
                <option value="">Status</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
            <select name="year" id="year" class="px-3 border rounded py-2 bg-white" required>
                <option value="">Tahun</option>
                <?php for( $i = date('Y'); $i >= date('Y') - 1; $i -= 1) : ?>
                <option value="<?= $i ?>">
                    <?= $i ?>
                </option>”;
                <?php endfor; ?>
            </select>
            <button type="submit" class="btn btn-sm text-sm btn-primary py-2">Generate Laporan</button>
        </form>
    </div>
</div>
@endsection
