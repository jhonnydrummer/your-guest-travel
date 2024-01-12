<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id', 'user_id_fk')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('product_id', 'product_id_fk')->references('id')
                ->on('products')->onDelete('cascade');

            // Adicione outras colunas conforme necessário para detalhes do favorito
            // Por exemplo: $table->string('comment')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
