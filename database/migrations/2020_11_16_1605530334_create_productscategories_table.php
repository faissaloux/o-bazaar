<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductscategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('productscategories', function (Blueprint $table) {

		$table->integer('id',20);
		$table->string('name');
		$table->string('slug')->nullable()->default('NULL');
		$table->string('image')->nullable()->default('NULL');
		$table->timestamp('created_at')->default('CURRENT_TIMESTAMP');
		$table->timestamp('updated_at')->nullable()->default('NULL');
		$table->timestamp('deleted_at')->nullable()->default('NULL');
		$table->string('lang')->default('en');
		$table->string('store_id')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('productscategories');
    }
}