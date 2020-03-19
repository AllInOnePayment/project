<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_payment');
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('amount');
            $table->integer('old_balance');
            $table->integer('current_balance');
            $table->bigInteger('receipt_number');
            $table->string('receipt_file');
            $table->timestamps();

            $table->foreign('service_id')->references('id')->
                                on('service_lists')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->
                                on('users')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
