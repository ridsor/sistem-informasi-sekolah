<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id');
            $table->foreignId('siswa_id');
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->string('tahun_pelajaran',9);
            $table->char('skp_spiritual_predikat', 1);
            $table->string('skp_spiritual_deskripsi');
            $table->char('skp_sosial_predikat', 1);
            $table->string('skp_sosial_deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
};
