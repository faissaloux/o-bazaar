<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {

		$table->integer('id',10)->unsigned();
		$table->string('key');
		$table->text('value');
		$table->string('lang')->default('en');

        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}