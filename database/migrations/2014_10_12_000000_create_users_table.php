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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('job')->nullable();
            $table->string('role')->default('employee');
            $table->decimal('salary', 10, 2)->nullable();
            $table->date('hired_date')->nullable();
            $table->foreignId('department_id')->nullable()->constrained('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
