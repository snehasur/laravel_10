<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */public function up(): void
{
    Schema::create('stripe_customers', function (Blueprint $table) {
        $table->id();
        $table->string('student_id'); // Assuming student_id is a string
        $table->string('student_name');
        $table->string('student_email');
        $table->string('token'); // Assuming token is a string
        $table->timestamps();   
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stripe_customers');
    }
};
