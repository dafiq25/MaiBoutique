<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id_cart');
            $table->integer('id_pemesanan')->nullable()->unsigned();
            $table->integer('id_product')->nullable()->unsigned();
            $table->integer('id')->nullable()->unsigned();
            $table->integer('status');
            $table->integer('quantity');

            $table->foreign('id_pemesanan', 'fk_pesan')->references('id_pemesanan')->on('pemesanan');
            $table->foreign('id_product', 'fk_product')->references('id_product')->on('produk');
            $table->foreign('id', 'fk_member')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
