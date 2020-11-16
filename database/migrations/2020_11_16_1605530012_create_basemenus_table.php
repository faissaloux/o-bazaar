<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasemenusTable extends Migration
{
    public function up()
    {
        Schema::create('basemenus', function (Blueprint $table) {

            $table->bigIncrements('id',255);
            $table->string('name')->nullable()->default('NULL');
            $table->text('menu');
            $table->string('area')->nullable()->default('NULL');
            $table->string('lang')->default('en');

        });
    }

    public function down()
    {
        Schema::dropIfExists('basemenus');
    }
}