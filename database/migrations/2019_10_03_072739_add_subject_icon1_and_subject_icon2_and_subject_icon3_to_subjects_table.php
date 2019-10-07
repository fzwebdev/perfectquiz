<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubjectIcon1AndSubjectIcon2AndSubjectIcon3ToSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->string('subjectIcon1',50)->nullable();
            $table->string('subjectIcon2',50)->nullable();
            $table->string('subjectIcon3',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('subjectIcon1');
            $table->dropColumn('subjectIcon2');
            $table->dropColumn('subjectIcon3');
        });
    }
}
