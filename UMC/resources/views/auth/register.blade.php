@extends('layouts.app')
@section('title','register')

@section('content')
    <h2>Pendaftaran Akun</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_username">ID (10 Digit Angka):</label>
            <input type="text" class="form-control" id="id_username" name="id_username" required>
            @error('id_username')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="dokter">Dokter</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
@endsection
