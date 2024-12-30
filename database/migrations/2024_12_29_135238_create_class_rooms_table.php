<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('grade_level');
            $table->string('academic_year');
            $table->foreignId('homeroom_teacher_id')->constrained('teachers');
            $table->string('room_number');
            $table->integer('capacity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_rooms');
    }
}