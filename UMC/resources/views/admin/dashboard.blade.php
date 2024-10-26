@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container">
        <h1>Dashboard Admin</h1>
        <p>Selamat datang di dashboard Admin. Anda dapat mengelola pasien dan melihat data pasien.</p>

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

        <!-- Action Buttons -->
        <div class="mt-4">
            <a href="{{ route('patients.register') }}" class="btn btn-primary">Daftarkan Pasien Baru</a>
            <a href="{{ route('check.patient') }}" class="btn btn-secondary">Cek Data Pasien</a>
            {{-- <a href="{{ route('patients.index') }}" class="btn btn-info">Lihat Daftar Pasien</a> <!-- New button to view patients --> --}}
        </div>

        <!-- Table for Patients -->
        <h2 class="mt-5">Daftar Pasien</h2>
        @if ($patients->isEmpty())
            <p>Tidak ada pasien terdaftar.</p>
        @else
            <table class="table table-striped">
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
                                <a href="{{ route('patients.show', $patient->idpasien) }}" class="btn btn-info">Read</a>
                                <a href="{{ route('patients.edit', $patient->idpasien) }}" class="btn btn-warning">Update</a>
                                <form action="{{ route('patients.destroy', $patient->idpasien) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
