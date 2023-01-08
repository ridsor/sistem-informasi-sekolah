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
            $table->string('slug',50)->unique();
            $table->char('nis', 6)->unique();
            $table->char('nisn', 10)->unique();   
            $table->string('nm_siswa',50);
            $table->string('alamat',100);
            $table->enum('agama', ['Islam', 'Kristen', 'Budha']);
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->string('tempat_lahir', 25);
            $table->date('tanggal_lahir');
            $table->string('nohp');
            $table->string('ayah',50)->nullable();
            $table->string('ibu',50)->nullable();
            $table->string('wali',50)->nullable();
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
