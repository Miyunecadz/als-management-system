<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->date('enroldate');
            $table->string('lrn');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('suffix');
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
            $table->date('birthday');
            $table->string('birthplace');
            $table->string('civilstatus');
            $table->string('pwd');
            $table->string('religion');
            $table->string('indigenous');
            $table->string('mothertongue');
            $table->string('flastname');
            $table->string('ffirstname');
            $table->string('fmiddlename');
            $table->string('foccupation');
            $table->string('mlastname');
            $table->string('mfirstname');
            $table->string('mmiddlename');
            $table->string('moccupation');
            $table->string('lastgrade');
            $table->string('dropout');
            $table->string('dropoutother');
            $table->string('attendedals');
            $table->string('programname');
            $table->string('literacylevel');
            $table->string('yearattended');
            $table->string('completedprogram');
            $table->string('notcompletedreason');
            $table->string('inkms');
            $table->string('inhours');
            $table->string('transportationtocenter');
            $table->string('othertransportation');
            $table->text('sessionmonday');
            $table->text('sessiontuesday');
            $table->text('sessionwednesday');
            $table->text('sessionthursday');
            $table->text('sessionfriday');
            $table->text('sessionsaturday');
            $table->text('sessionsunday');
            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('students');
    }
}
