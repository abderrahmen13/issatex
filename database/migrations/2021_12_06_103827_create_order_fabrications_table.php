<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderFabricationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_fabrications', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->unique();
            $table->string('type')->default('Ordinaire');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('articleId')->nullable();
            $table->unsignedBigInteger('userId')->nullable();
            $table->unsignedBigInteger('ilotId')->nullable();
            $table->date('date')->nullable();
            $table->string('estimatedTime')->nullable();
            $table->string('unitPrice')->nullable();
            $table->string('additionalCost')->nullable();
            $table->string('qualite')->nullable();
            $table->string('status')->default('Non confirmé');
            $table->timestamps();
            $table->foreign('articleId')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ilotId')->references('id')->on('ilots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_fabrications');
    }
}
