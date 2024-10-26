@extends('layouts.app')

@section('title', 'Tambah Konsultasi')

@section('content')
    <h2>Tambah Konsultasi untuk {{ $patient->name }}</h2>

    <form action="{{ route('consultations.store', $patient->idpasien) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $patient->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" required>
        </div>
        <div class="mb-3">
            <label for="status_keterangan" class="form-label">Status Keterangan</label>
            <select class="form-select" name="status_keterangan" required>
                <option value="Dosen">Dosen</option>
                <option value="Karyawan">Karyawan</option>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Umum">Umum</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="hasil_analisa" class="form-label">Hasil Analisa</label>
            <textarea class="form-control" name="hasil_analisa" id="hasil_analisa" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="resep_obat" class="form-label">Resep Obat</label>
            <textarea class="form-control" name="resep_obat" id="resep_obat" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Konsultasi</button>
    </form>
@endsection
