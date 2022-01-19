<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdPlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_plannings', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->unique();
            $table->integer('qtePlanned')->nullable();
            $table->integer('qteFabricated1')->nullable();
            $table->integer('qteFabricated2')->nullable();
            $table->string('observation')->nullable();
            $table->date('date')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('ofId')->nullable();
            $table->unsignedBigInteger('ilotId')->nullable();
            $table->unsignedBigInteger('userId')->nullable();
            $table->timestamps();
            $table->foreign('ofId')->references('id')->on('order_fabrications')->onDelete('cascade');
            $table->foreign('ilotId')->references('id')->on('ilots')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prod_plannings');
    }
}
