<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pesanan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->references('id')->on('customer')->onDelete('restrict');
            $table->foreignId('paket_id')->references('id')->on('paket')->onDelete('restrict');
            $table->integer('berat');
            $table->integer('grand_total');
            $table->foreignId('status_pesanan_id')->references('id')->on('status_pesanan')->onDelete('restrict');
            $table->foreignId('status_pembayaran_id')->references('id')->on('status_pembayaran')->onDelete('restrict');


            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pesanan');
    }
}
