<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQteParTaillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qte_par_tailles', function (Blueprint $table) {
            $table->id();
            $table->string('qte')->nullable();
            $table->unsignedBigInteger('ofId')->nullable();
            $table->unsignedBigInteger('tailleId')->nullable();
            $table->timestamps();
            $table->foreign('ofId')->references('id')->on('order_fabrications')->onDelete('cascade');
            $table->foreign('tailleId')->references('id')->on('tailles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qte_par_tailles');
    }
}
