<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Patient;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        return view('payments.create', compact('patient'));
    }

    public function store(Request $request, $patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $amount = 0;

        // Tentukan biaya berdasarkan status pasien
        if ($patient->status === 'Dosen' || $patient->status === 'Karyawan') {
            $amount = 0; // Tidak ada biaya
        } else {
            $amount = 50000; // Biaya untuk mahasiswa dan umum
        }

        Payment::create([
            'idpasien' => $patientId,
            'jumlah' => $amount,
            'tanggal' => now(),
        ]);

        return redirect()->route('kasir.dashboard')->with('success', 'Pembayaran berhasil!');
    }

    public function report()
    {
        $payments = Payment::with('patient')->whereMonth('tanggal', now()->month)->get();
        return view('payments.report', compact('payments'));
    }
}
