<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    // Menampilkan semua konsultasi
    public function index()
    {
        $patients = Patient::all(); // Ambil semua data pasien
        $consultations = Consultation::with('patient')->get(); // Ambil semua konsultasi dengan relasi pasien
        return view('consultations.dashboard', compact('patients', 'consultations'));
    }
    

    // Menampilkan form untuk menambahkan konsultasi
    public function create($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        return view('consultations.create', compact('patient'));
    }

    // Menyimpan konsultasi baru
    public function store(Request $request, $patientId)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nik' => 'required|string',
            'name' => 'required|string',
            'no_hp' => 'required|string',
            'status_keterangan' => 'required|string',
            'hasil_analisa' => 'required|string',
            'resep_obat' => 'required|string',
        ]);

        Consultation::create([
            'idpasien' => $patientId,
            'tanggal' => $request->tanggal,
            'nik' => $request->nik,
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'status_keterangan' => $request->status_keterangan,
            'hasil_analisa' => $request->hasil_analisa,
            'resep_obat' => $request->resep_obat,
        ]);

        return redirect()->route('consultations.index')->with('success', 'Konsultasi berhasil ditambahkan.');
    }
}
