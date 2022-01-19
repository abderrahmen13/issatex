<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaletteColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palette_colis', function (Blueprint $table) {
            $table->id();
            $table->string('numArticle')->nullable();
            $table->string('quality1')->nullable();
            $table->string('quality2')->nullable();
            $table->unsignedBigInteger('coliId')->nullable();
            $table->unsignedBigInteger('paletteId')->nullable();
            $table->timestamps();
            $table->foreign('coliId')->references('id')->on('colis')->onDelete('cascade');
            $table->foreign('paletteId')->references('id')->on('palettes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('palette_colis');
    }
}
