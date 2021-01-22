<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('meta')->nullable();
            $table->text('author')->nullable();
            $table->text('email')->nullable();
            $table->text('title');
            $table->text('subtitle')->nullable();
            $table->text('image')->nullable();
            $table->text('short_descrip')->nullable();
            $table->text('description');
            $table->enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('blogs');
    
    }
}
