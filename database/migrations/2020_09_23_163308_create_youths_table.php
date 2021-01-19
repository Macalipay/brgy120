<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYouthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname', 160);
            $table->string('middlename', 160);
            $table->string('lastname', 160);
            $table->string('height', 160);
            $table->string('weight', 160);
            $table->string('gender', 160);
            $table->string('lgbtqi')->default('off');
            $table->string('lgbtqi_value')->nullable();
            $table->string('birthday', 160);
            $table->string('birthday_place', 160);
            $table->string('marital_status', 160);
            $table->string('religion', 160);
            $table->string('spouse', 160);
            $table->string('precinct_no', 160);
            $table->string('tin', 160);
            $table->string('philhealth', 160);
            $table->string('pagibig', 160);
            $table->string('sss', 160);
            $table->string('residing_date', 160);
            $table->unsignedBigInteger('street_id');
            $table->string('contact');
            $table->string('contact_person');
            $table->string('contact_relation');
            $table->string('contact_number');
            $table->string('educational_attainment');
            $table->string('course');
            $table->string('skills');
            $table->string('occupation');
            $table->string('income');
            $table->string('house_number', 160);
            $table->string('solo_parent')->default('off');
            $table->string('email', 160)->nullable();
            $table->string('student')->default('off');
            $table->string('number_of_children')->default(0);
            $table->string('mother_name', 160);
            $table->string('father_name', 160);
            $table->timestamps();

            $table->foreign('street_id')
                ->references('id')
                ->on('streets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('youths');
    }
}
