<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pasien</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Detail Pasien</h2>
    <table class="table">
        <tr>
            <th>ID Pasien</th>
            <td>{{ $patient->idpasien }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $patient->nik }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $patient->name }}</td>
        </tr>
        <tr>
            <th>Tempat, Tanggal Lahir</th>
            <td>{{ $patient->birthdate }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $patient->address }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $patient->phone }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $patient->status }}</td>
        </tr>
    </table>
    <a href="{{ route('check.patient.form') }}" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
