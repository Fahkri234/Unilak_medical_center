@extends('layouts.app')

@section('title', 'Detail Pasien')

@section('content')
    <div class="container">
        <h1>Detail Pasien</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $patient->name }}</h5>
                <p class="card-text">
                    <strong>NIK:</strong> {{ $patient->nik }}<br>
                    <strong>Tanggal Lahir:</strong> {{ $patient->birthdate }}<br>
                    <strong>Alamat:</strong> {{ $patient->address }}<br>
                    <strong>No HP:</strong> {{ $patient->phone }}<br>
                    <strong>Status:</strong> {{ $patient->status }}
                </p>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
                <a href="{{ route('patients.edit', $patient->idpasien) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection
