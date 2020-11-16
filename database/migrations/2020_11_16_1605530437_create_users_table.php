<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

		$table->bigInteger('id',20)->unsigned();
		$table->string('name')->nullable()->default('NULL');
		$table->string('email');
		$table->timestamp('email_verified_at')->nullable()->default('NULL');
		$table->string('password')->nullable()->default('NULL');
		$table->string('remember_token',100)->nullable()->default('NULL');
		$table->timestamp('created_at')->nullable()->default('CURRENT_TIMESTAMP');
		$table->timestamp('updated_at')->nullable()->default('NULL');
		$table->string('avatar')->nullable()->default('NULL');
		$table->string('description')->nullable()->default('NULL');
		$table->string('role')->nullable()->default('NULL');
		$table->string('phone')->nullable()->default('NULL');
		$table->string('country')->nullable()->default('NULL');
		$table->string('device')->nullable()->default('NULL');
		$table->string('browser')->nullable()->default('NULL');
		$table->string('ip')->nullable()->default('NULL');
		$table->string('gender')->nullable()->default('NULL');
		$table->string('statue')->nullable()->default('NULL');
		$table->timestamp('deleted_at')->nullable()->default('NULL');
		$table->string('store_id')->nullable()->default('NULL');
		$table->string('os')->nullable()->default('NULL');
		$table->text('device_token');
		$table->text('last_login');

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}