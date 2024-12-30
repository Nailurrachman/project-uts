<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('grade_type_id')->constrained('grade_types');
            $table->decimal('score', 5, 2);
            $table->text('notes')->nullable();
            $table->string('semester');
            $table->string('academic_year');
            $table->timestamps();
            $table->softDeletes();

            // Define a shorter name for the unique constraint
            $table->unique(
                ['student_id', 'subject_id', 'grade_type_id', 'semester', 'academic_year'],
                'unique_grade_entry'
            );
        });
    }

    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
