<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idpasien'); // Gunakan nama kolom yang sama seperti di tabel patients
            $table->date('tanggal');
            $table->string('nik');
            $table->string('name');
            $table->string('no_hp');
            $table->string('status_keterangan');
            $table->text('hasil_analisa');
            $table->text('resep_obat');
            $table->timestamps();

            // Kunci asing
            $table->foreign('idpasien')->references('idpasien')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
}


