<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_id')->unique()->unsigned();
            $table->string('service_name');
            $table->string('http')->nullable();
            $table->bigInteger('bank_account')->nullable();
            $table->bigInteger('mobile_bank_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('mobile_bank_id')->references('id')->
                                on('mobile_bank_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_lists');
    }
}
