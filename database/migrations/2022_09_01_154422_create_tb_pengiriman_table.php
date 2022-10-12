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
        Schema::create('tb_pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('bulan',255);
            $table->string('tahun',255);
            $table->string('total',255) ->nullable();
            $table->string('sukses_antar',255);
            $table->string('gagal_antar',255);
            $table->string('retus',255);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pengiriman');
    }
};
