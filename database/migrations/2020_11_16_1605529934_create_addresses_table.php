<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {

			$table->bigIncrements('id',11);
			$table->string('given_name')->nullable()->default('NULL');
			$table->string('country_code')->nullable()->default('NULL');
			$table->string('street')->nullable()->default('NULL');
			$table->string('housenumber')->nullable()->default('NULL');
			$table->string('state')->nullable()->default('NULL');
			$table->string('city')->nullable()->default('NULL');
			$table->string('postal_code')->nullable()->default('NULL');
			$table->string('latitude')->nullable()->default('NULL');
			$table->string('longitude')->nullable()->default('NULL');
			$table->string('phone')->nullable()->default('NULL');
			$table->integer('user_id',255)->nullable()->default('NULL');
			$table->tinyInteger('is_primary',1)->nullable()->default('NULL');
			$table->tinyInteger('is_billing',1)->nullable()->default('NULL');
			$table->tinyInteger('is_shipping',1)->nullable()->default('NULL');
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}