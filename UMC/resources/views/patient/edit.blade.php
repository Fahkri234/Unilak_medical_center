@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
    <div class="container">
        <h1>Edit Data Pasien</h1>

        <form action="{{ route('patients.update', $patient->idpasien) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $patient->nik }}" required>
            </div>

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" required>
            </div>

            <div class="form-group">
                <label for="birthdate">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $patient->birthdate }}" required>
            </div>

            <div class="form-group">
                <label for="address">Alamat:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $patient->address }}" required>
            </div>

            <div class="form-group">
                <label for="phone">No HP:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $patient->phone }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Dosen" {{ $patient->status == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                    <option value="Karyawan" {{ $patient->status == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                    <option value="Mahasiswa" {{ $patient->status == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    <option value="Umum" {{ $patient->status == 'Umum' ? 'selected' : '' }}>Umum</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
