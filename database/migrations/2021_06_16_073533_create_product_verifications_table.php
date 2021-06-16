<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auction_id');
            $table->string('status')->default('processing');     
            $table->string('remark');
            $table->timestamps();

            $table->foreign('auction_id')->references('id')->on('auctions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_verifications');
    }
}
