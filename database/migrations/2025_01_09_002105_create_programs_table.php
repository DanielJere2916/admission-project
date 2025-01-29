<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('department_id'); // Foreign key (corrected from `int` to `unsignedBigInteger`)
            $table->string('program_name');
            $table->string('program_acronym');
            $table->boolean('program_status')->default(true);
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('department_id') // department_id is the foreign key
                  ->references('id')        // References the id column in the departments table
                  ->on('departments')       // References the departments table
                  ->onDelete('cascade');    // Optional: Cascade delete programs if a department is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};