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
        Schema::create('nilai_mapel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nilai_id');
            $table->string('nm_mapel');
            $table->integer('p_kkm');
            $table->integer('p_angka');
            $table->char('p_predikat',1);
            $table->string('p_deskripsi');
            $table->integer('k_kkm');
            $table->integer('k_angka');
            $table->char('k_predikat',1);
            $table->string('k_deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_mapel');
    }
};
