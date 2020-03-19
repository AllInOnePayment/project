<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_number')->unique()->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->string('user_name');
            $table->string('addres');
            $table->integer('status');
            $table->integer('Payment_status');
            $table->timestamps();

            $table->foreign('service_id')->references('service_id')->
                                on('service_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_providers');
    }
}
