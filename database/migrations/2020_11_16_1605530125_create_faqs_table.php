<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {

            $table->bigIncrements('id',11);
            $table->text('question');
            $table->text('answer');
            $table->integer('category',255)->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}