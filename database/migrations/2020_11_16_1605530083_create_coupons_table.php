<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {

			$table->bigIncrements('id',255);
			$table->string('code');
			$table->string('valid_from')->nullable()->default('NULL');
			$table->string('valid_to')->nullable()->default('NULL');
			$table->string('discount_type');
			$table->string('discount');
			$table->string('maxUsage')->nullable()->default('NULL');
			$table->integer('userMax',11)->nullable()->default('NULL');
			$table->string('logged')->nullable()->default('NULL');
			$table->string('shipping')->nullable()->default('NULL');
			$table->text('description');
			$table->string('count')->nullable()->default('NULL');
			$table->string('title')->nullable()->default('NULL');
			$table->string('statue')->nullable()->default('NULL');
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}