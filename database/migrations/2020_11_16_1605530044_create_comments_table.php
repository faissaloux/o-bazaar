<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

			$table->bigIncrements('id',20);
			$table->integer('user_id',11);
			$table->string('post_id');
			$table->string('author');
			$table->string('email');
			$table->text('content');
			$table->string('approved',4);
			$table->timestamps();
			$table->string('deleted_at');

        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}