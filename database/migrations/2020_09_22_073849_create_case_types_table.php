<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('case');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('case_types')->insert(
            array(
                array('case' => 'Robbery',
                      'description' => 'The action of taking property unlawfully from a person or place by force or threat of force:' ))
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_types');
    }
}
