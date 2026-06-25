<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rekapitulasi KRS Kampus</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        .title { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
    </style>
</head>
<body>
    <div class="title">
        <h2>LAPORAN REKAPITULASI KRS UNIVERSITAS</h2>
        <p>Data Tanggal Ekstraksi: {{ date('d-m-Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NPM Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Dosen Pengajar</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($krs as $index => $k)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><b>{{ $k->npm }}</b></td>
                    <td>{{ $k->jadwal && $k->jadwal->matakuliah ? $k->jadwal->matakuliah->nama_matakuliah : 'N/A' }}</td>
                    <td>{{ $k->jadwal && $k->jadwal->dosen ? $k->jadwal->dosen->nama : 'N/A' }}</td>
                    <td>{{ $k->jadwal ? $k->jadwal->kelas : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>