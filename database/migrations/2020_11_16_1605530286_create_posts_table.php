<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

			$table->bigIncrements('id',255);
			$table->string('author')->nullable()->default('NULL');
			$table->string('title')->nullable()->default('NULL');
			$table->text('content');
			$table->string('thumbnail')->nullable()->default('NULL');
			$table->integer('statue',255)->nullable()->default('NULL');
			$table->integer('comments_enabled',255)->nullable()->default('NULL');
			$table->integer('type',11)->nullable()->default('NULL');
			$table->string('slug',11)->nullable()->default('NULL');
			$table->integer('categoryID',255)->nullable()->default('NULL');
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}