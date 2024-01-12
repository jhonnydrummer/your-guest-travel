<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateMediaRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('media_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->decimal('media_rating', 3, 2)->default(0.00);
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_ratings');
    }

};
