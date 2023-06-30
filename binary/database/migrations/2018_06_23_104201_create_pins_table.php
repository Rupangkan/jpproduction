<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->decimal('amount');
            $table->date('dated');
            $table->string('status')->default('open');
            $table->timestamps();
        });

        Schema::create('pin_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->decimal('pin');
            $table->string('status')->default('open');
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
        Schema::dropIfExists('pins');
        Schema::dropIfExists('pin_list');
    }
}
