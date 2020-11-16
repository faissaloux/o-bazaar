<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {

            $table->bigIncrements('id',255);
            $table->string('title')->nullable()->default('NULL');
            $table->text('content');
            $table->string('slug')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default('NULL');
            $table->string('lang')->default('en');
            $table->string('store_id')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}