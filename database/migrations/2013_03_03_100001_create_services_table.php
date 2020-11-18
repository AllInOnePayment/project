<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name');
            $table->string('http');
            $table->bigInteger('bank_account');
            $table->bigInteger('mobile_bank_id')->nullable()->unsigned();
            $table->bigInteger('payment_start');
            $table->bigInteger('payment_end');
            $table->bigInteger('group');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('mobile_bank_id')->references('id')->
                                on('mobile_banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
