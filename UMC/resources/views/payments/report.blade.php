@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('content')
    <h2>Laporan Transaksi</h2>

    @if ($payments->isEmpty())
        <p>Tidak ada transaksi yang ditemukan.</p>
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
