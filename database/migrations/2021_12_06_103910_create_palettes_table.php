<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palettes', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->unique();
            $table->integer('numberColis')->nullable();
            $table->integer('totalNumberArticles')->nullable();
            $table->date('shippingDate')->nullable();
            $table->unsignedBigInteger('ofId')->nullable();
            $table->timestamps();
            $table->foreign('ofId')->references('id')->on('order_fabrications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('palettes');
    }
}
