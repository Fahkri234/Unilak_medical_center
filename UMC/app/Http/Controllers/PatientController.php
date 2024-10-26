<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        // Ambil semua pasien dari database
        $patients = Patient::all();

        // Kirim data pasien ke tampilan
        return view('consultations.dashboard', compact('patient'));
    }
    // Menampilkan halaman cek pasien
    public function checkPatientForm()
    {
        return view('patient.check_patient');
    }

    // Mengecek data pasien
    public function checkPatient(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16', // Asumsi NIK adalah string dengan maksimal 16 karakter
        ]);

        // Mencari data pasien berdasarkan NIK
        $patient = Patient::where('nik', $request->nik)->first();

        if ($patient) {
            return view('patient.patient_details', compact('patient'));
        } else {
            return redirect()->route('patients.register')->with('message', 'Pasien tidak ditemukan. Silakan lakukan pendaftaran.');
        }
    }

    public function showRegistrationForm()
    {
        return view('patient.register'); // Tampilkan form pendaftaran pasien
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:patients|digits_between:10,16',
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'status' => 'required|in:Dosen,Karyawan,Mahasiswa,Umum',
        ]);

        Patient::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return redirect()->route('patients.register')->with('success', 'Pasien berhasil terdaftar!');
    }

      // Display the specified patient
      public function show($id)
      {
          $patient = Patient::findOrFail($id);
          return view('patient.show', compact('patient'));
      }
  
      // Show the form for editing the specified patient
      public function edit($id)
      {
          $patient = Patient::findOrFail($id);
          return view('patient.edit', compact('patient'));
      }
  
      // Update the specified patient in storage
      public function update(Request $request, $id)
      {
          $request->validate([
              'nik' => 'required|string',
              'name' => 'required|string',
              'birthdate' => 'required|date',
              'address' => 'required|string',
              'phone' => 'required|string',
              'status' => 'required|string',
          ]);
  
          $patient = Patient::findOrFail($id);
          $patient->update($request->all());
          return redirect()->route('admin.dashboard')->with('success', 'Data pasien berhasil diperbarui!');
      }
  
      // Remove the specified patient from storage
      public function destroy($id)
      {
          $patient = Patient::findOrFail($id);
          $patient->delete();
          return redirect()->route('admin.dashboard')->with('success', 'Data pasien berhasil dihapus!');
      }
}
