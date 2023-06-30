<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree', function (Blueprint $table){
            $table->increments('id');
            $table->string('member_code');
            $table->string('left')->nullable();
            $table->string('right')->nullable();
            $table->integer('lcount')->default(0);
            $table->integer('rcount')->default(0);
            $table->timestamps();
        });

        Schema::create('incomes', function (Blueprint $table){
            $table->increments('id');
            $table->string('member_code');
            $table->decimal('day_bal')->default(0.00);
            $table->decimal('current_bal')->default(0.00);
            $table->decimal('total_bal')->default(0.00);
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
        Schema::dropIfExists('tree');
        Schema::dropIfExists('incomes');
    }
}
