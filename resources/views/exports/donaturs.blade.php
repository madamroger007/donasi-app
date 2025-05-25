<!DOCTYPE html>
<html>
<head>
    <title>Export Data Donatur</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Daftar Donatur</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>No WhatsApp</th>
                <th>Alamat</th>
                <th>Tipe Donatur</th>
                <th>Status</th>
                <th>Tgl Lahir</th>
                <th>Tgl Gabung</th>
                <th>Kota Lahir</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kode Pos</th>
                <th>Provinsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donaturs as $donatur)
            <tr>
                <td>{{ $donatur->nama }}</td>
                <td>{{ $donatur->no_telepon }}</td>
                <td>{{ $donatur->no_whatsapp }}</td>
                <td>{{ $donatur->alamat }}</td>
                <td>{{ optional($donatur->tipedonatur)->nama }}</td>
                <td>{{ optional($donatur->statuskeanggotaan)->nama }}</td>
                <td>{{ $donatur->tanggal_lahir }}</td>
                <td>{{ $donatur->tanggal_gabung }}</td>
                <td>{{ $donatur->kota_lahir }}</td>
                <td>{{ $donatur->kelurahan }}</td>
                <td>{{ $donatur->kecamatan }}</td>
                <td>{{ $donatur->kode_pos }}</td>
                <td>{{ $donatur->provinsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
