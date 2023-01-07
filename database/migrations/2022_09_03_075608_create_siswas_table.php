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
            $table->integer('nis')->unique(); 
            $table->integer('nisn')->unique();   
            $table->string('nm_siswa');
            $table->string('alamat');
            $table->enum('agama', ['Islam', 'Kristen', 'Budha']);
            $table->enum('jenis_kelamin', ['laki - laki', 'perempuan']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('nohp');
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('wali')->nullable();
            $table->string('tahun_ajaran');
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
