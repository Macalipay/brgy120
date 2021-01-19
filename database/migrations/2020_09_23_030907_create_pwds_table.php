<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePwdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pwd');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('pwds')->insert(
            array(
                array('pwd' => 'Vision Impairment.',
                      'description' => "means that a person's eyesight cannot be corrected to a 'normal' level" ))
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pwds');
    }
}
