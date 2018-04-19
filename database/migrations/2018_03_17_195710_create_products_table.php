<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 100);
            $table->string('imagePath', 100);
            $table->json('gallery')->nullable();
            $table->string('slug', 100);
            $table->float('price', 8, 2);
            $table->float('salePrice', 8, 2)->nullable();
            $table->boolean('recommended');
            $table->boolean('inStock')->default(true);
            $table->longText('description');
            $table->string('meta_description', 160)->nullable();
            $table->string('meta_title', 60)->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('manufacture_id')->nullable()->unsigned();
            $table->foreign('manufacture_id')->references('id')->on('manufactures');
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
}
