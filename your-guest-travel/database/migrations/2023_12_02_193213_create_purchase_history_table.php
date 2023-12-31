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
            $table->unsignedBigInteger('invoice_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id', 'users_id_fk')
                ->references('id')
                ->on('users');
            $table->foreign('product_id', 'products_id_fk')
                ->references('id')
                ->on('products');
            $table->foreign('invoice_id', 'invoice_id_fk')
                ->references('id')
                ->on('invoices');
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
