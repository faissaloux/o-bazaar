<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductswishlistTable extends Migration
{
    public function up()
    {
        Schema::create('productswishlist', function (Blueprint $table) {

		$table->integer('id',255);
		$table->integer('user_id',255);
		$table->timestamp('created_at')->default('CURRENT_TIMESTAMP');
		$table->timestamp('updated_at')->nullable()->default('NULL');
		$table->timestamp('deleted_at')->nullable()->default('NULL');
		$table->string('lang')->nullable()->default('NULL');
		$table->string('store_id')->nullable()->default('NULL');
		$table->string('productID')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('productswishlist');
    }
}