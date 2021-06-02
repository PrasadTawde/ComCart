<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResellProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resell__products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            
            $table->unsignedBigInteger('cat_id');
            
            $table->unsignedBigInteger('subcat_id');
       
            $table->string('title');
            $table->string('discription');
            $table->integer('price');
            $table->binary('image_1');
            $table->binary('image_2');
            

            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcat_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('resell__products');
    }
}
