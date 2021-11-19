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
            $table->string('lrn')->nullable();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('suffix')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality')->nullable();
            $table->string('province')->nullable();
            $table->date('birthday')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('sex')->nullable();
            $table->string('civilstatus')->nullable();
            $table->string('pwd')->nullable();
            $table->string('religion')->nullable();
            $table->string('indigenous')->nullable();
            $table->string('mothertongue')->nullable();
            $table->string('flastname')->nullable();
            $table->string('ffirstname')->nullable();
            $table->string('fmiddlename')->nullable();
            $table->string('foccupation')->nullable();
            $table->string('mlastname')->nullable();
            $table->string('mfirstname')->nullable();
            $table->string('mmiddlename')->nullable();
            $table->string('moccupation')->nullable();
            $table->string('lastgrade')->nullable();
            $table->string('dropout')->nullable();
            $table->string('dropoutother')->nullable();
            $table->string('attendedals')->nullable();
            $table->string('programname')->nullable();
            $table->string('literacylevel')->nullable();
            $table->string('yearattended')->nullable();
            $table->string('completedprogram')->nullable();
            $table->string('notcompletedreason')->nullable();
            $table->string('inkms')->nullable();
            $table->string('inhours')->nullable();
            $table->string('transportationtocenter')->nullable();
            $table->string('othertransportation')->nullable();
            $table->text('sessionmonday')->nullable();
            $table->text('sessiontuesday')->nullable();
            $table->text('sessionwednesday')->nullable();
            $table->text('sessionthursday')->nullable();
            $table->text('sessionfriday')->nullable();
            $table->text('sessionsaturday')->nullable();
            $table->text('sessionsunday')->nullable();
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
