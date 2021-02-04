<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('youth_id');
            $table->string('picture')->nullable();
            $table->string('signature')->nullable();
            $table->string('right_thumb')->nullable();
            $table->string('left_thumb')->nullable();
            $table->timestamps();

            $table->foreign('youth_id')
                ->references('id')
                ->on('youths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_information');
    }
}
