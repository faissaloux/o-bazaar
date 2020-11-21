<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('carts', function(Blueprint $table) {
		    $table->bigIncrements('id');
		    $table->integer('user_id');
		    $table->integer('store_id');
		    $table->integer('product_id');
		    $table->integer('quantity');
		    $table->integer('price');
		    $table->integer('subtotal');
		    $table->timestamps();
			  $table->timestamp('deleted_at')->nullable();
		
		});


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('carts');

    }
}
