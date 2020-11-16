<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductreviewsTable extends Migration
{
    public function up()
    {
        Schema::create('productreviews', function (Blueprint $table) {

            $table->bigIncrements('id',255);
            $table->integer('user_id',255);
            $table->integer('rating',255);
            $table->string('title');
            $table->integer('productID',255);
            $table->text('review');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('productreviews');
    }
}