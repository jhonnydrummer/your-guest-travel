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
        Schema::create('purchase_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('invoice');
            $table->timestamps();


            $table->foreign('user_id', 'users_id_fk')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');

            $table->foreign('product_id', 'products_id_fk')
                ->references('id')
                ->on('products')
                ->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_history');
    }
};
