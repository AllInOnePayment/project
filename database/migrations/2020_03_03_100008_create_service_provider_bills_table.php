<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProviderBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_provider_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bill_id')->unique()->unsigned();
            $table->string('last_reading')->nullable();
            $table->string('current_reading')->nullable();
            $table->string('receipt_number');
            $table->integer('bill_amount');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('bill_id')->references('id')->
                                on('register_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_provider_bills');
    }
}
