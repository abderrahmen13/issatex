<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureOFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_o_f_s', function (Blueprint $table) {
            $table->id();
            $table->integer('qte1choice')->nullable();
            $table->integer('qte2choice')->nullable();
            $table->string('amount')->nullable();
            $table->unsignedBigInteger('ofId')->nullable();
            $table->unsignedBigInteger('factureId')->nullable();
            $table->timestamps();
            $table->foreign('ofId')->references('id')->on('order_fabrications')->onDelete('cascade');
            $table->foreign('factureId')->references('id')->on('factures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facture_o_f_s');
    }
}
