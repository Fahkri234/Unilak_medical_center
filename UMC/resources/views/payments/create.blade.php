@extends('layouts.app')

@section('title', 'Input Pembayaran')

@section('content')
    <h2>Input Pembayaran untuk {{ $patient->name }}</h2>
    <form action="{{ route('payments.store', $patient->idpasien) }}" method="POST">
        @csrf
        <p>Status: {{ $patient->status }}</p>
        <p>Biaya: {{ ($patient->status === 'Dosen' || $patient->status === 'Karyawan') ? 'Gratis' : 'Rp 50.000' }}</p>
        <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
    </form>
@endsection
