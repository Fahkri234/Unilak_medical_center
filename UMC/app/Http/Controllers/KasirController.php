<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Patient;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'kasir') {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $patients = Patient::all(); // Ambil semua data pasien
        $payments = Payment::with('patient')->get(); // Ambil semua data pembayaran

        return view('kasir.dashboard', compact('patients', 'payments'));
    }
}
