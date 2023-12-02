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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 8, 2); // Preço com 8 dígitos, 2 casas decimais
            $table->string('sku'); // Quantidade do produto
            $table->unsignedBigInteger('category_id'); // Chave estrangeira para a tabela de categorias
            $table->unsignedBigInteger('photo_id')->nullable(); // Referência para a tabela de fotos, pode ser nulo
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade'); // Se a categoria for excluída, os produtos associados também serão excluídos
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('photo_id')
                ->references('id')
                ->on('photos')
                ->onDelete('set null'); // Define a ação 'set null' para a chave estrangeira de fotos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
