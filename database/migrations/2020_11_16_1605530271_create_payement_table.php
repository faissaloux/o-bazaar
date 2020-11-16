<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayementTable extends Migration
{
    public function up()
    {
        Schema::create('payement', function (Blueprint $table) {

            $table->bigIncrements('id',11);
            $table->string('order_id')->nullable()->default('NULL');
            $table->string('method')->nullable()->default('NULL');
            $table->string('transactionID')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('payement');
    }
}