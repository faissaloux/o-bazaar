<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTable extends Migration
{
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {

		$table->integer('id',11);
		$table->string('name');
		$table->string('delivery_days');
		$table->string('statue')->nullable()->default('NULL');
		$table->string('cost');
		$table->timestamp('created_at')->default('CURRENT_TIMESTAMP');
		$table->timestamp('updated_at')->default('0000-00-00 00:00:00');
		$table->timestamp('deleted_at')->nullable()->default('NULL');
		$table->string('lang')->default('en');
		$table->string('store_id')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('shipping');
    }
}