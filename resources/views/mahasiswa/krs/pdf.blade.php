<!DOCTYPE html>
<html>
<head>
    <title>Cetak Kartu Rencana Studi</title>
    <style>
        body { font-family: sans-serif; color: #333; line-height: 1.4; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h2 { margin: 0; uppercase; }
        .meta-table { width: 100%; margin-bottom: 20px; font-size: 14px; }
        .data-table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 13px; }
        .data-table th, .data-table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .data-table th { bg-color: #f5f5f5; font-weight: bold; }
        .text-center { text-align: center; }
    </style>
</head>
<body>

    <div class="header">
        <h2>KARTU RENCANA STUDI (KRS)</h2>
        <p>Sistem Informasi Akademik Universitas</p>
    </div>

    <table class="meta-table">
        <tr>
            <td style="width: 15%;"><strong>NPM</strong></td>
            <td>: {{ $mhs->username_fk }}</td>
            <td style="width: 20%;"><strong>Tahun Akademik</strong></td>
            <td>: 2026/2027 - Ganjil</td>
        </tr>
        <tr>
            <td><strong>Nama</strong></td>
            <td>: {{ $mhs->name }}</td>
            <td><strong>Status</strong></td>
            <td>: Aktif</td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;" class="text-center">No</th>
                <th style="width: 20%;">Kode</th>
                <th>Mata Kuliah</th>
                <th>Dosen Pengajar</th>
                <th style="width: 10%;" class="text-center">Kelas</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($krs as $index => $k)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $k->kode_matakuliah }}</td>
                    <td><strong>{{ $k->jadwal && $k->jadwal->matakuliah ? $k->jadwal->matakuliah->nama_matakuliah : 'N/A' }}</strong></td>
                    <td>{{ $k->jadwal && $k->jadwal->dosen ? $k->jadwal->dosen->nama : 'N/A' }}</td>
                    <td class="text-center">{{ $k->jadwal ? $k->jadwal->kelas : '-' }}</td>
                    <td>{{ $k->jadwal ? $k->jadwal->hari : '-' }}, {{ $k->jadwal ? $k->jadwal->jam : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>