<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostscategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('postscategories', function (Blueprint $table) {

            $table->bigIncrements('id',20);
            $table->string('name');
            $table->string('slug')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('postscategories');
    }
}