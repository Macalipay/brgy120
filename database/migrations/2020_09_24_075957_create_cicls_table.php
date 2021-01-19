<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiclsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cicls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('youth_id');
            $table->unsignedBigInteger('case_id');
            $table->date('date_happen');
            $table->date('date_filed');
            $table->string('complainant');
            $table->string('remarks');
            $table->timestamps();

            $table->foreign('youth_id')
                ->references('id')
                ->on('youths');

            $table->foreign('case_id')
                ->references('id')
                ->on('case_types');
        });

        // DB::table('cicls')->insert(
        //     array(
        //         array('youth_id' => "1",
        //               'case_id' => "1",
        //               'date_happen' => '10/10/20',
        //               'date_filed' => '10/10/20',
        //               'complainant' => 'asd',
        //               'remarks' => 'asd'))
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cicls');
    }
}
