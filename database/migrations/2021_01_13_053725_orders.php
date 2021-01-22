<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
           $table->id();
            $table->string('orderamount');
            $table->string('transactionid');
            $table->text('order_cart');
            $table->text('orderdetail');
            $table->text('userid');
            $table->enum('status', ['pending', 'inprocess','dispatched','delivered']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

