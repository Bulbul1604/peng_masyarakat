<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table tr th,
        table tr td {
            padding: 4px 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table border="1" style="border-collapse: collapse">
            <thead>
                <tr>
                    <th>Nama Pengaduan</th>
                    <th>Tgl. Pengaduan</th>
                    <th>Isi Pengaduan</th>
                    <th>Tgl. Tanggapan</th>
                    <th>Isi Tanggapan</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                <tr>
                    <td>{{ ucwords($report->pengaduan->user->name) }}</td>
                    <td>{{ ucwords($report->pengaduan->tgl_pengaduan->translatedFormat('d F Y')) }}</td>
                    <td>{{ ucwords($report->pengaduan->isi_pengaduan) }}</td>
                    <td>{{ ucwords($report->tgl_tanggapan->translatedFormat('d F Y')) }}</td>
                    <td>{{ ucwords($report->isi_tanggapan) }}</td>
                    <td>{{ ucwords($report->user->name) }} - {{ ucwords($report->user->keterangan) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
