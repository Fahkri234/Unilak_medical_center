@extends('layouts.app')

@section('title', 'Daftar Pasien')

@section('content')
    <h2>Daftar Pasien</h2>

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
                            <a href="{{ route('consultations.create', $patient->id) }}" class="btn btn-success">Input Konsultasi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
