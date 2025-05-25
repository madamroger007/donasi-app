<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Export Data Kegiatan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Daftar Kegiatan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Keterangan</th>
                <th>Tanggal Kegiatan</th>
                <th>Nama Donatur</th>
                <th>Penanggung Jawab</th>
                <th>Jenis Kegiatan</th>
                <th>Sumber Donasi</th>
                <th>Bentuk Donasi</th>
                <th>Masuk Donasi</th>
                <th>Keluar Donasi</th>
                <th>Jumlah</th>
                <th>Dibuat</th>
                <th>Diubah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kegiatans as $index => $kegiatan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kegiatan->judul }}</td>
                <td>{{ $kegiatan->slug }}</td>
                <td>{{ $kegiatan->keterangan }}</td>
                <td>{{ $kegiatan->tanggal_kegiatan }}</td>
                <td>{{ $kegiatan->nama_donatur }}</td>
                <td>{{ $kegiatan->penanggung_jawab }}</td>
                <td>{{ $kegiatan->jenis_kegiatan }}</td>
                <td>{{ $kegiatan->sumber_donasi }}</td>
                <td>{{ $kegiatan->bentuk_donasi }}</td>
                <td>{{ $kegiatan->masuk_donasi }}</td>
                <td>{{ $kegiatan->keluar_donasi }}</td>
                <td>{{ $kegiatan->jumlah }}</td>
                <td>{{ $kegiatan->created_at }}</td>
                <td>{{ $kegiatan->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
