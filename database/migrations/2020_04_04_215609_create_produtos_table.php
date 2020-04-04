<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_make')->unsigned();
            $table->bigInteger('fk_marca')->unsigned();
            $table->string('descricao');
            $table->string('foto');
            $table->decimal('preco', 6, 2);

            $table->foreign('fk_make')->references('id')->on('makes')->onDelete('cascade');
            $table->foreign('fk_marca')->references('id')->on('marcas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
