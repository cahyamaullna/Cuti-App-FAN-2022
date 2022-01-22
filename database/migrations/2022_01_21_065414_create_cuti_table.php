<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nomer_surat')->unique();
            $table->string('jenis_cuti');
            $table->integer('sisa_cuti')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->string('keterangan');
            $table->integer('npp_pengganti');
            $table->string('nama_pengganti');
            $table->string('upload_bukti');
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
        Schema::dropIfExists('cuti');
    }
}
