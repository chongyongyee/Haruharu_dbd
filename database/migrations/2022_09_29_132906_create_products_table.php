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
            $table->decimal('productSellingPrice',12,2);
            $table->longText('productDescription');
            $table->tinyInteger('trending')->default('0')->comment('1=trending, 0= not trending');

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
