<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan', function (Blueprint $table) {
            $table->integer('id_pemesanan')->nullable()->unsigned();
            // $table->integer('id_cart')->nullable()->unsigned();
            // $table->date('tanggal_pesan');
            // $table->integer('quantity');
            $table->integer('total_price');

            $table->foreign('id_pemesanan', 'fk_pemesanan')->references('id_pemesanan')->on('pemesanan');
            // $table->foreign('id_cart', 'fk_cart')->references('id_cart')->on('cart');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pemesanan');
    }
}
