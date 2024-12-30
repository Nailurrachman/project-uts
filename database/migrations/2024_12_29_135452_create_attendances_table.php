<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('class_id')->constrained('class_rooms');
            $table->date('date');
            $table->enum('status', ['present', 'absent', 'sick', 'permission']);
            $table->text('description')->nullable();
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->string('semester');
            $table->string('academic_year');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}