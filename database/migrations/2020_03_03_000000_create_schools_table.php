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
            $table->bigIncrements('student_id');
            $table->bigInteger('service_id')->unsigned();
            $table->string('user_name');
            $table->integer('level');
            $table->binary('status');
            $table->binary('transport');
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
        Schema::dropIfExists('schools');
    }
}
