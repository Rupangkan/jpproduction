<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('last_payout_date');
            $table->decimal('last_payout_amount');
            $table->string('member_code');
            $table->decimal('total_payout_amount');
            $table->timestamps();
        });

        Schema::create('payout_details', function (Blueprint $table) {
            $table->increments('id');
            $table->date('payout_date');
            $table->decimal('payout_amount');
            $table->string('member_code');
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
        Schema::dropIfExists('payouts');
        Schema::dropIfExists('payout_details');
    }
}
