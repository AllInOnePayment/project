<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->string('user_number')->unique();
            $table->bigInteger('service_id')->unsigned();
            $table->string('user_name');
            $table->integer('level');
            $table->string('address');
            $table->string('class');
            $table->integer('status');
            $table->integer('Payment_status');
            $table->integer('transport');
            $table->timestamps();

            $table->foreign('service_id')->references('id')->
                                on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
