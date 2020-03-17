<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('student_id')->nullable()->unsigned();
            $table->bigInteger('service_number')->nullable()->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('bill_id')->unique()->unsigned();
            $table->timestamps();

            $table->foreign('service_id')->references('service_id')->on('service_lists')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('student_id')
            ->on('schools')->onDelete('cascade');
            $table->foreign('service_number')->references('service_number')
            ->on('service_providers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_services');
    }
}
