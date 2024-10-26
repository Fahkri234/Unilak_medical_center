@extends('layouts.app')

@section('title', 'Dashboard Konsultasi')

@section('content')
    <h2>Dashboard Konsultasi</h2>

    <h3>Daftar Pasien</h3>
    @if ($patients->isEmpty())
        <p>Tidak ada pasien terdaftar.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->nik }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->address }}</td>
                        <td>
                            <a href="{{ route('consultations.create', $patient->idpasien) }}" class="btn btn-success">Input Konsultasi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h3>Daftar Konsultasi</h3>
    @if ($consultations->isEmpty())
        <p>Tidak ada data konsultasi.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID Konsultasi</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal</th>
                    <th>Status Keterangan</th>
                    <th>Hasil Analisa</th>
                    <th>Resep Obat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultations as $consultation)
                    <tr>
                        <td>{{ $consultation->id }}</td>
                        <td>{{ $consultation->patient->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($consultation->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $consultation->status_keterangan }}</td>
                        <td>{{ $consultation->hasil_analisa }}</td>
                        <td>{{ $consultation->resep_obat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
