<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bill_id')->unique()->unsigned();
            $table->integer('school_bill');
            $table->integer('transport_bill')->nullable();
            $table->integer('other_bill')->nullable();
            $table->string('receipt_number');
            $table->integer('total_amount');
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
        Schema::dropIfExists('school_bills');
    }
}
