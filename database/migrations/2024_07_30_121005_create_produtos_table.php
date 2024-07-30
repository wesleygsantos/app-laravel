<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->float('valor');
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca')->references('id')->on('marca');
            $table->float('estoque')->nullable();
            $table->integer('id_cidade')->unsigned();
            $table->foreign('id_cidade')->references('id')->on('cidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
