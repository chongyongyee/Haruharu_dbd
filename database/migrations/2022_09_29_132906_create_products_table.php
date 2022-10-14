<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('productId');
            $table->string('productName');
            $table->unsignedBigInteger('categoryId');
            $table->integer('productQuantity');
            $table->decimal('productOriginalPrice',12,2);
            $table->decimal('productSellingPrice',12,2);
            $table->longText('productDescription');

            //foreign key
            $table->foreign('categoryId')->references('categoryId')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
