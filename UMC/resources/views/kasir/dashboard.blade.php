@extends('layouts.app')

@section('title', 'Dashboard Kasir')

@section('content')
    <h2>Dashboard Kasir</h2>

    <div class="mb-3">
        <a href="{{ route('payments.create', 0) }}" class="btn btn-success">Input Pembayaran Pasien</a>
        <a href="{{ route('payments.report') }}" class="btn btn-info">Laporan Transaksi</a>
    </div>

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
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->nik }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->address }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>
                            <a href="{{ route('payments.create', $patient->idpasien) }}" class="btn btn-success">Input Pembayaran</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h3>Daftar Pembayaran</h3>
    @if ($payments->isEmpty())
        <p>Tidak ada transaksi terbaru.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Pasien</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->patient->name }}</td>
                        <td>{{ $payment->jumlah }}</td>
                        <td>{{ $payment->tanggal->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
