<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClassStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_student', function (Blueprint $table) {
            $table->unsignedInteger('classe_id')->index();
            $table->foreign('classe_id')->references('id')->on('classes');

            $table->unsignedInteger('student_id')->index();
            $table->foreign('student_id')->references('id')->on('students');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classe_student', function (Blueprint $table) {
            $table->dropForeign('classe_student_classe_id_foreign');
            $table->dropForeign('classe_student_student_id_foreign');
        });
    }
}
