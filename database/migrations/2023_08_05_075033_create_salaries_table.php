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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('department_id');
        $table->unsignedInteger('month');
        $table->unsignedInteger('year');
        $table->decimal('basic_salary', 10, 2);
        $table->decimal('leave_deductions', 10, 2);
        $table->decimal('total_salary', 10, 2);
        $table->timestamps();
        
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('department_id')->references('id')->on('departments');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
