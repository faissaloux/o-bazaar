<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {

		$table->integer('id',11);
		$table->string('image')->nullable()->default('NULL');
		$table->timestamp('created_at')->default('CURRENT_TIMESTAMP');
		$table->timestamp('updated_at')->nullable()->default('NULL');
		$table->string('link',400)->nullable()->default('NULL');
		$table->timestamp('deleted_at')->nullable()->default('NULL');
		$table->string('lang')->default('en');
		$table->string('store_id')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('slider');
    }
}