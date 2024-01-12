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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('products_id');
            $table->decimal('amount', 8, 2);
            $table->unsignedBigInteger('invoice_id');
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id', 'user_id_fk')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('products_id', 'products_id_fk')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->foreign('invoice_id', 'invoices_id_fk')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
