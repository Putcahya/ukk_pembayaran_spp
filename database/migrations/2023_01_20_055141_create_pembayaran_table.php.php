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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_petugas')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_siswa')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_tagihan')->references('id')->on('tagihans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('tgl_bayar');
            $table->bigInteger('nominal');
            $table->rememberToken();
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
        //
    }
};
