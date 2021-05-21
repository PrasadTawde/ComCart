<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('category', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name')->unique();
        //     $table->string('description')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('sub_category', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigIncrements('category_id');
        //     $table->string('name')->unique();
        //     $table->string('description')->nullable();
        //     $table->timestamps();
        //     $table->foreign('category_id')->references('id')->on('category')
        //         ->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('sub_category');
    }
}
