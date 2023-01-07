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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id');
            $table->string('slug')->unique();
            $table->char('nis', 6)->unique();
            $table->char('nisn', 10)->unique();   
            $table->string('nm_siswa');
            $table->string('alamat');
            $table->enum('agama', ['Islam', 'Kristen', 'Budha']);
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->string('tempat_lahir', 25);
            $table->date('tanggal_lahir');
            $table->string('nohp');
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('wali')->nullable();
            $table->string('tahun_ajaran', 9);
            $table->string('foto');
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
        Schema::dropIfExists('siswa');
    }
};
