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
            $table->integer('kkm');
            $table->integer('n_mapel');
            $table->integer('n_tugas');
            $table->integer('n_uts');
            $table->integer('n_uas');
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
        Schema::dropIfExists('nilai_mapel');
    }
};
