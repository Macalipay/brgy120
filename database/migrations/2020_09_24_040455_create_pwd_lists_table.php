<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePwdListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwd_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('youth_id');
            $table->unsignedBigInteger('pwd_id');
            $table->timestamps();

            $table->foreign('youth_id')
                ->references('id')
                ->on('youths');

            $table->foreign('pwd_id')
                ->references('id')
                ->on('pwds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pwd_lists');
    }
}
